<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Client;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\PaymentMethod;
use App\Models\Delivery;
use App\Models\Book;

class WebController extends Controller
{
    public function index(){
        $products = Product::active()->orderBy('id','desc')->limit(4)->get();

        $favorites = Product::active()->withCount('details')->orderBy('details_count', 'desc')->having('details_count', '>', 0)->limit(4)->get();

        return view('index', compact('products', 'favorites'));
    }

    public function shop(Request $request){
        $categories = Category::with('subcategories.subcategories')->whereNull('parent_id')->active()->orderBy('name', 'asc')->get();
        
        $productsQuery = Product::active()->when($request->search, function($query, $search){
            return $query->where('name', 'LIKE', '%'.$search.'%');
        })->when($request->category_id, function($query, $category_id){
            $descendantIds = \App\Models\Category::where('id', $category_id)
                ->orWhere('parent_id', $category_id)
                ->orWhereIn('parent_id', function($q) use ($category_id){
                    $q->select('id')->from('categories')->where('parent_id', $category_id);
                })
                ->pluck('id');
            return $query->whereIn('category_id', $descendantIds);
        });

        // Marcas dinámicas basadas en la selección de categoría y búsqueda actual (antes de filtrar por marca y precio)
        $brandIds = (clone $productsQuery)->pluck('brand_id')->unique();
        $brands = Brand::whereIn('id', $brandIds)->orderBy('name', 'asc')->get();

        $products = $productsQuery->when($request->brand_id, function($query, $brand_id){
            return $query->where('brand_id', $brand_id);
        })->when($request->min_price, function($query, $min_price){
            return $query->where('price', '>=', $min_price);
        })->when($request->max_price, function($query, $max_price){
            return $query->where('price', '<=', $max_price);
        })->orderBy('name', 'asc')->paginate(12);

        return view('shop', compact('categories', 'products', 'brands'));
    }

    public function product(Product $product){
        return view('product', compact('product'));
    }

    public function cart(){
        $cart = session('cart', []);
        $total = array_reduce($cart, function($sum, $item){
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);
        return view('cart', compact('cart', 'total'));
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }

    public function contact_store(Request $request){
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        \App\Models\ContactMessage::create($request->all());

        \Illuminate\Support\Facades\Mail::to(env('MAIL_FROM_ADDRESS', 'soporte@ferremax.com'))->send(new \App\Mail\ContactSubmittedMail($request->all()));

        return redirect()->back()->with('success', '¡Gracias por contactarnos! Tu mensaje ha sido enviado exitosamente.');
    }

    public function dashboard(){
        $clients = Client::count();
        $products = Product::active()->count();
        $sales = Sale::active()->sum('total');
        return view('admin.index', compact('clients', 'products', 'sales'));
    }

    public function checkout(){
        $cart = session('cart', []);

        if(count($cart) == 0){
            return redirect()->route('index');
        }

        $total = array_reduce($cart, function($sum, $item){
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);
        $payment_methods = PaymentMethod::all();
        $deliveries = Delivery::all();
        return view('checkout', compact('cart', 'total', 'payment_methods', 'deliveries'));
    }

    public function finalize(Request $request){
        $rules = [
            'voucher' => 'required',
            'provincia' => 'required',
            'city' => 'required',
            'street_name' => 'required',
            'street_number' => 'required',
            'payment_type' => 'required'
        ];

        if ($request->voucher === 'Factura') {
            $rules['bussiness_document'] = ['required', 'digits:11', 'regex:/^(10|20)/'];
            $rules['bussiness_name'] = ['required', 'string', 'regex:/^[^0-9]/'];
        }

        $request->validate($rules, [
            'bussiness_document.digits' => 'El RUC debe tener exactamente 11 dígitos.',
            'bussiness_document.regex' => 'El RUC debe iniciar con "10" o "20".',
            'bussiness_name.regex' => 'La Razón Social no puede empezar con números.'
        ]);

        $client_id = auth()->user()->id;
        $cart = session('cart', []);
        $total = array_reduce($cart, function($sum, $item){
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);

        // Zonas de despacho seguras (backend)
        $zonePrices = [
            'Chiclayo' => 10.00, 'La Victoria' => 10.00, 'José Leonardo Ortiz' => 10.00,
            'Pimentel' => 12.00, 'San José' => 12.00, 'Reque' => 12.00, 'Monsefú' => 12.00,
            'Pomalca' => 15.00, 'Ciudad Eten' => 15.00, 'Ferreñafe' => 15.00, 'Lambayeque' => 15.00
        ];
        $shipping_cost = isset($zonePrices[$request->city]) ? $zonePrices[$request->city] : 0;

        $number = DB::table('numbers')->where('voucher', $request->voucher)->first();

        $sale_number = $number->serie.'-'.str_pad($number->number, 8, "0", STR_PAD_LEFT);

        $full_address = $request->street_name . " " . $request->street_number;
        if($request->street_extra) {
            $full_address .= " (" . $request->street_extra . ")";
        }
        $full_city = "Lambayeque, " . $request->provincia . ", " . $request->city;

        $payment_method_id = ($request->payment_type == 'yape') ? 3 : 1; // Asumiendo Yape es ID 3 o creamos la logica generica.

        $sale = Sale::create([
            'bussiness_name' => $request->bussiness_name,
            'bussiness_document' => $request->bussiness_document,
            'voucher' => $request->voucher,
            'city' => $full_city,
            'address' => $full_address,
            'number' => $sale_number,
            'client_id' => $client_id,
            'total' => $total + $shipping_cost,
            'payment_method_id' => $payment_method_id,
            'delivery_id' => null,
            'date' => now(),
            'status' => 'Pendiente'
        ]);

        foreach($cart as $id => $item){
            SaleDetail::create([
                'sale_id' => $sale->id,
                'product_id' => $id,
                'price' => $item['price'],
                'quantity' => $item['quantity']
            ]);

            $product = Product::find($id);

            $product->update([
                'stock' => $product->stock - $item['quantity']
            ]);
        }

        DB::table('numbers')->where('voucher', $request->voucher)->update([
            'number' => $number->number + 1
        ]);

        session()->forget('cart');

        return redirect()->route('success')->with('url', route('sales.pdf', $sale)); 
    }

    public function success(){
        if(!session()->has('url')){
            return redirect()->route('index');
        }
        return view('success');
    }

    public function orders(){
        $client_id = auth()->user()->id;
        $sales = Sale::active()->where('client_id', $client_id)->orderBy('date', 'desc')->paginate(10);

        return view('orders', compact('sales'));
    }

    public function profile(){
        return view('profile');
    }

    public function update(Request $request){
        $user = auth()->user();
        
        $request->validate([
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:clients,email,'.$user->id
        ]);

        auth()->user()->update($request->all());

        return redirect()->route('profile');
    }

    public function book(){
        return view('legal.libro-reclamaciones');
    }

    public function privacy(){ return view('legal.politica-privacidad'); }
    public function cookies(){ return view('legal.politica-cookies'); }
    public function terms(){ return view('legal.terminos-servicio'); }
    public function refunds(){ return view('legal.reembolsos-devoluciones'); }
    public function shipping(){ return view('legal.politica-envios'); }

    public function book_store(Request $request){

        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'document' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'claim_type' => 'required',
            'product_type' => 'required',
            'claim' => 'required',
        ]);

        Book::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'document' => $request->document,
            'city' => 'N/A',
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'product_type' => $request->product_type,
            'description' => 'N/A',
            'amount' => 0,
            'order_number' => 'N/A',
            'claim' => '[' . $request->claim_type . '] ' . $request->claim,
            'client_request' => 'N/A',
            'date' => now()
        ]);

        return redirect()->route('book');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Models\Sale;

class SaleController extends Controller
{
    public function index(Request $request){
        $sales = Sale::active()->when($request->number, function($query, $number){
            return $query->where('number', 'LIKE', '%'.$number.'%');
        })->when($request->date, function($query, $date){
            return $query->whereDate('date', $date);
        })->orderBy('date', 'desc')->paginate(20);

        return view('admin.sales.index', compact('sales'));
    }

    public function edit(Request $request, Sale $sale){
        return view('admin.sales.edit', compact('sale'));
    }

    public function update(Request $request, Sale $sale){
        $request->validate([
            'status' => 'required',
        ]);

        $oldStatus = $sale->status;
        $sale->update($request->all());

        if ($oldStatus != 'Completado' && $request->status == 'Completado') {
            $fpdf = app(Fpdf::class);
            $pdfContent = $this->generatePdfContent($sale, $fpdf);
            
            \Illuminate\Support\Facades\Mail::to($sale->client->email)->send(new \App\Mail\SaleCompletedMail($sale, $pdfContent));
        }

        return redirect()->route('sales.index')->with('message', 'Registro actualizado');
    }

    public function destroy(Request $request, Sale $sale){
        $sale->update(['deleted' => 1]);

        return redirect()->route('sales.index')->with('message', 'Registro eliminado');
    }

    public function pdf(Request $request, Sale $sale, Fpdf $fpdf){
        $content = $this->generatePdfContent($sale, $fpdf);
        return response($content, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="comprobante_'.$sale->number.'.pdf"'
        ]);
    }

    private function convertNumberToLetras($entero) {
        $formatter = array(0=>"CERO",1=>"UNO",2=>"DOS",3=>"TRES",4=>"CUATRO",5=>"CINCO",6=>"SEIS",7=>"SIETE",8=>"OCHO",9=>"NUEVE",10=>"DIEZ",11=>"ONCE",12=>"DOCE",13=>"TRECE",14=>"CATORCE",15=>"QUINCE",16=>"DIECISEIS",17=>"DIECISIETE",18=>"DIECIOCHO",19=>"DIECINUEVE",20=>"VEINTE",21=>"VEINTIUNO",22=>"VEINTIDOS",23=>"VEINTITRES",24=>"VEINTICUATRO",25=>"VEINTICINCO",26=>"VEINTISEIS",27=>"VEINTISIETE",28=>"VEINTIOCHO",29=>"VEINTINUEVE",30=>"TREINTA",40=>"CUARENTA",50=>"CINCUENTA",60=>"SESENTA",70=>"SETENTA",80=>"OCHENTA",90=>"NOVENTA",100=>"CIEN", 200=>"DOSCIENTOS", 300=>"TRESCIENTOS", 400=>"CUATROCIENTOS", 500=>"QUINIENTOS", 600=>"SEISCIENTOS", 700=>"SETECIENTOS", 800=>"OCHOCIENTOS", 900=>"NOVECIENTOS");
        if ($entero < 30) return $formatter[$entero] ?? $entero;
        if ($entero < 100) {
            $dec = floor($entero / 10) * 10; $uni = $entero % 10;
            return $formatter[$dec] . ($uni > 0 ? " Y " . $formatter[$uni] : "");
        }
        if ($entero < 1000) {
            $cen = floor($entero / 100) * 100; $res = $entero % 100;
            $str = ($entero == 100) ? "CIEN" : ($cen == 100 ? "CIENTO" : $formatter[$cen]);
            return $str . ($res > 0 ? " " . $this->convertNumberToLetras($res) : "");
        }
        if ($entero < 1000000) {
            $mil = floor($entero / 1000); $res = $entero % 1000;
            $str = ($mil == 1) ? "MIL" : $this->convertNumberToLetras($mil) . " MIL";
            return $str . ($res > 0 ? " " . $this->convertNumberToLetras($res) : "");
        }
        return $entero;
    }

    private function numeroALetras($numero) {
        $entero = floor($numero);
        $decimal = round(($numero - $entero) * 100);
        return "SON: " . trim($this->convertNumberToLetras($entero)) . " CON " . str_pad($decimal, 2, '0', STR_PAD_LEFT) . "/100 SOLES";
    }

    private function generatePdfContent(Sale $sale, Fpdf $fpdf) {
        $fpdf->AddPage();
        
        // Logo de FerreMax nuevo
        $fpdf->Image(public_path('assets/furni/favicon.png'), 15, 2, 35);

        // Emitente (Coherencia en marca)
        $fpdf->SetFont('Arial', 'B', 16);
        $fpdf->SetTextColor(0, 0, 0); // Texto negro
        $fpdf->SetXY(53.80, 12);
        
        $texto = 'FERREMAX';
        $ancho = $fpdf->GetStringWidth($texto);
        $fpdf->Cell($ancho, 8, $texto, 0, 0, 'L');
        
        $fpdf->SetTextColor(248, 143, 1); // Naranja oficial #f88f01
        $fpdf->Cell(10, 8, '.', 0, 1, 'L');
        
        $fpdf->SetFont('Arial', '', 9);
        $fpdf->SetTextColor(80, 80, 80);
        $fpdf->SetXY(53.80, 20);
        $fpdf->SetX(53.80);
        $fpdf->Cell(80, 6, utf8_decode('Dirección: 409 Eufemio Lora y Lora, Chiclayo-Lambayeque'), 0, 1, 'L');
        $fpdf->SetX(53.80);
        $fpdf->Cell(80, 4, utf8_decode('Teléfono: +51 978045931'), 0, 1, 'L');

        // Box de Boleta/Factura
        $fpdf->SetXY(140, 10);
        $fpdf->SetTextColor(0, 0, 0);
        $fpdf->SetFont('Arial', 'B', 10);
        if($sale->voucher == 'Boleta'){
            $fpdf->MultiCell(60, 6, utf8_decode("R.U.C. 20123456789\nBOLETA DE VENTA ELECTRÓNICA\n".$sale->number), 1, 'C');
        }elseif($sale->voucher == 'Factura'){
            $fpdf->MultiCell(60, 6, utf8_decode("R.U.C. 20123456789\nFACTURA ELECTRÓNICA\n".$sale->number), 1, 'C');
        }

        $fpdf->Ln(15);
        $fpdf->SetY(45); // Ajuste vertical 

        $fpdf->SetFont('Arial', 'B', 10);
        if($sale->voucher == 'Boleta'){
            $fpdf->Cell(30, 6, utf8_decode('Cliente:'));
            $fpdf->SetFont('Arial', '', 10);
            $fpdf->Cell(100, 6, utf8_decode($sale->client->name.' '.$sale->client->last_name));
            $fpdf->Ln();
            $fpdf->SetFont('Arial', 'B', 10);
            $fpdf->Cell(30, 6, 'DNI / C.E.:');
            $fpdf->SetFont('Arial', '', 10);
            $fpdf->Cell(100, 6, $sale->client->document);
        }elseif($sale->voucher == 'Factura'){
            $fpdf->Cell(30, 6, utf8_decode('Razón Social:'));
            $fpdf->SetFont('Arial', '', 10);
            $fpdf->Cell(100, 6, utf8_decode($sale->bussiness_name));
            $fpdf->Ln();
            $fpdf->SetFont('Arial', 'B', 10);
            $fpdf->Cell(30, 6, 'RUC:');
            $fpdf->SetFont('Arial', '', 10);
            $fpdf->Cell(100, 6, $sale->bussiness_document);
        }

        $fpdf->Ln();
        $fpdf->SetFont('Arial', 'B', 10);
        $fpdf->Cell(30, 6, utf8_decode('Fecha Emisión:'));
        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Cell(60, 6, date('d-m-Y', strtotime($sale->date)));
        
        $fpdf->SetFont('Arial', 'B', 10);
        $fpdf->Cell(20, 6, utf8_decode('Moneda:'));
        $fpdf->SetFont('Arial', '', 10);
        $fpdf->Cell(40, 6, utf8_decode('SOLES (PEN)'));

        $fpdf->Ln(12);

        // Tabla Header con color verde
        $fpdf->SetFont('Arial', 'B', 9);
        $fpdf->SetFillColor(59, 93, 80); // Verde corporativo
        $fpdf->SetTextColor(255, 255, 255); // Texto blanco
        
        $fpdf->Cell(95, 8, 'Producto / Servicio', 1, 0, 'C', 1);
        $fpdf->Cell(25, 8, 'P. Unitario', 1, 0, 'C', 1);
        $fpdf->Cell(25, 8, 'Cantidad', 1, 0, 'C', 1);
        $fpdf->Cell(45, 8, 'Subtotal', 1, 0, 'C', 1);
        
        $fpdf->SetTextColor(0, 0, 0); // Regresamos al texto negro
        $fpdf->SetFont('Arial', '', 9);
        $fpdf->Ln();

        $items_total = 0;
        foreach($sale->details as $detail){
            $fpdf->Cell(95, 8, utf8_decode(substr($detail->product->name, 0, 48)), 1, 0, 'L');
            $fpdf->Cell(25, 8, number_format($detail->price, 2), 1, 0, 'R');
            $fpdf->Cell(25, 8, key_exists('quantity', $detail->toArray()) ? $detail->quantity : 1, 1, 0, 'C');
            $fpdf->Cell(45, 8, number_format($detail->price * $detail->quantity, 2), 1, 0, 'R');
            $fpdf->Ln();
            $items_total += ($detail->price * $detail->quantity);
        }

        $fpdf->Ln(5);

        // Footer table calculations
        $total = $sale->total;
        $shipping = $total - $items_total;
        $subtotal = $items_total / 1.18;
        $igv = $items_total - $subtotal;

        // Son letras
        $letras = $this->numeroALetras($total);
        $fpdf->SetFont('Arial', 'B', 9);
        $fpdf->Cell(190, 6, utf8_decode($letras), 0, 1, 'L');
        $fpdf->Ln(4);

        $fpdf->SetFont('Arial', 'B', 9);
        $fpdf->SetX(120);
        $fpdf->Cell(45, 6, 'SUBTOTAL', 0, 0, 'R');
        $fpdf->SetFont('Arial', '', 9);
        $fpdf->Cell(25, 6, number_format($subtotal, 2), 0, 1, 'R');
        
        $fpdf->SetX(120);
        $fpdf->SetFont('Arial', 'B', 9);
        $fpdf->Cell(45, 6, 'IGV 18%', 0, 0, 'R');
        $fpdf->SetFont('Arial', '', 9);
        $fpdf->Cell(25, 6, number_format($igv, 2), 0, 1, 'R');

        $fpdf->SetX(120);
        $fpdf->SetFont('Arial', 'B', 9);
        $fpdf->Cell(45, 6, 'ENVIO', 0, 0, 'R');
        $fpdf->SetFont('Arial', '', 9);
        $fpdf->Cell(25, 6, number_format($shipping, 2), 0, 1, 'R');

        $fpdf->Ln(2);
        $fpdf->SetX(120);
        $fpdf->SetFont('Arial', 'B', 11);
        $fpdf->SetTextColor(59, 93, 80);
        $fpdf->Cell(45, 6, 'TOTAL (PEN)', 0, 0, 'R');
        $fpdf->Cell(25, 6, number_format($total, 2), 0, 1, 'R');
        
        $fpdf->SetTextColor(0, 0, 0); // Volver color natural al final
        
        $fpdf->Ln(15);
        
        // Agregar QR estático (Descargado)
        if (file_exists(public_path('assets/furni/qr.png'))) {
            $fpdf->Image(public_path('assets/furni/qr.png'), 10, $fpdf->GetY(), 25);
        }
        
        $fpdf->SetY($fpdf->GetY() + 8);
        $fpdf->SetX(40);
        $fpdf->SetFont('Arial', 'I', 9);
        $fpdf->SetTextColor(100, 100, 100);
        $fpdf->MultiCell(150, 5, utf8_decode("¡Gracias por su compra en FerreMax. ¡Construyendo juntos el futuro de Chiclayo!"), 0, 'L');

        return $fpdf->Output('S');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function check(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if(Auth::guard('web')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('index'));
        }

        return back()->withErrors([
            'email' => 'Correo electrónico o contraseña incorrecta'
        ]);


    }

    public function register(){
        return view('auth.register');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'document' => 'required|unique:clients,document',
            'phone' => 'required',
            'email' => 'required|email|unique:clients,email',
            'password' => 'required|min:8'
        ]);

        // Separar Nombres y Apellidos
        $names = explode(' ', trim($request->name), 2);
        $firstName = $names[0];
        $lastName = isset($names[1]) ? $names[1] : '-';

        Client::create([
            'name' => $firstName,
            'last_name' => $lastName,
            'document' => $request->document,
            'address' => '-',
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password) 
        ]);

        return redirect()->route('auth.login');
    }

    public function forgot(){
        return view('auth.forgot');
    }

    public function sendResetLink(Request $request){
        $request->validate([
            'email' => 'required|email|exists:clients,email'
        ], [
            'email.exists' => 'No encontramos a ningún usuario con ese correo electrónico.'
        ]);

        $status = Password::broker('clients')->sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', 'Te hemos enviado el enlace de restablecimiento de contraseña por correo electrónico.');
        }

        return back()->withErrors(['email' => __($status)]);
    }

    public function reset(Request $request, $token) {
        return view('auth.reset', ['token' => $token, 'email' => $request->email]);
    }

    public function processReset(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::broker('clients')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('auth.login')->with('status', 'Tu contraseña ha sido restablecida exitosamente. Ahora puedes iniciar sesión.');
        }

        return back()->withErrors(['email' => __($status)]);
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
}

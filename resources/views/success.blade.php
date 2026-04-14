@extends('template')

@section('title', 'Procesando Pago')

@section('content')
<div class="untree_co-section">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
        <div class="text-center p-5 bg-white border shadow-sm" style="max-width: 600px; border-radius: 12px;">
            <div class="mb-4">
                <i class="fa fa-spinner fa-spin fa-4x mb-3" style="color: #f88f01;"></i>
                <h1 class="h2 fw-bold text-dark">¡Pedido Recibido!</h1>
                <p class="text-muted fs-5 mt-2">Estamos verificando tu pago...</p>
            </div>
            
            <p class="text-secondary mb-4" style="line-height: 1.6;">
                Tu orden ha sido registrada con éxito en nuestro sistema de FerreMax. En breve verificaremos tus fondos o tarjeta y recibirás tu comprobante electrónico directamente por correo electrónico.
            </p>
            
            <div class="alert px-4 py-3 text-start" role="alert" style="background-color: #f8f9fa; border-left: 4px solid #3b5d50;">
                <h5 class="fw-bold fs-6 mb-1 text-dark"><i class="fa fa-info-circle me-2"></i>Pasos Siguientes</h5>
                <p class="mb-0 text-muted" style="font-size: 0.85rem;">Si seleccionaste Yape, revisa tu aplicación o SMS. Mientras tanto, estamos preparando tus herramientas para su despacho.</p>
            </div>

            @if(session('url'))
                <!-- El comprobante se adjuntará exclusivamente en el correo -->
            @endif
            
            <br>
            <a href="{{ route('index') }}" class="btn px-4 py-3 mt-4 fw-bold shadow-sm" style="background-color: #3b5d50; color: #ffffff; border: none; border-radius: 8px;">SEGUIR COMPRANDO</a>
        </div>
    </div>
</div>
@endsection
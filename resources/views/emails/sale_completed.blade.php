<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu pedido en FerreMax</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333333; margin: 0; padding: 20px;">
    <div style="max-width: 600px; background-color: #ffffff; padding: 30px; margin: 0 auto; border-top: 5px solid #f88f01; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
        <!-- Header -->
        <div style="text-align: center; border-bottom: 2px solid #f0f0f0; padding-bottom: 20px; margin-bottom: 20px;">
            <h1 style="color: #3b5d50; margin: 0; font-size: 28px;">FerreMax<span style="color:#f88f01;">.</span></h1>
        </div>

        <!-- Body -->
        <h2 style="color: #3b5d50;">¡Tus compras ya están listas!</h2>
        <p style="font-size: 16px; line-height: 1.5;">Hola <strong>{{ $sale->client->name }}</strong>,</p>
        <p style="font-size: 16px; line-height: 1.5;">Queríamos informarte que tu pedido <strong>#{{ $sale->number }}</strong> de nuestra tienda ha sido <strong style="color: #f88f01;">validado y completado</strong> exitosamente.</p>
        
        <div style="margin: 30px 0; padding: 15px; background-color: #f9f9f9; border-left: 4px solid #3b5d50;">
            <h3 style="margin-top: 0; color: #3b5d50;">Detalles rápidos:</h3>
            <ul style="list-style-type: none; padding: 0;">
                <li style="margin-bottom: 8px;"><strong>Dirección:</strong> {{ $sale->address }}, {{ $sale->city }}</li>
                <li style="margin-bottom: 8px;"><strong>Pago Total:</strong> S/{{ number_format($sale->total, 2) }}</li>
                <li style="margin-bottom: 8px;"><strong>Fecha de Aprobación:</strong> {{ date('d-m-Y', strtotime(now())) }}</li>
            </ul>
        </div>

        <p style="font-size: 16px; line-height: 1.5;">Adjunto a este correo electrónico encontrarás tu <strong>{{ $sale->voucher }} Electrónica</strong> en formato PDF. Contiene el desglose oficial de tu compra para todo trámite de garantía y resguardo.</p>
        
        <p style="font-size: 16px; line-height: 1.5; text-align: center; margin-top: 30px; color: #666;">¡Gracias por confiar en <strong>FerreMax</strong> para tus proyectos!</p>

        <!-- Footer -->
        <div style="text-align: center; font-size: 12px; color: #999999; border-top: 1px solid #f0f0f0; padding-top: 20px; margin-top: 20px;">
            © {{ date('Y') }} FerreMax. Todos los derechos reservados.<br>
            Soporte: soporte@ferremax.test
        </div>
    </div>
</body>
</html>

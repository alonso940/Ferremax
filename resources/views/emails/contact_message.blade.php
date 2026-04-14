<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nuevo mensaje de contacto - FerreMax</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 30px; border-radius: 8px; margin-top: 40px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
        <div style="text-align: center; margin-bottom: 20px;">
            <h1 style="color: #212529; font-size: 28px; margin: 0;">FerreMax<span style="color: #f88f01;">.</span></h1>
            <p style="color: #666; font-size: 14px; margin-top: 5px;">Nuevo mensaje de contacto web</p>
        </div>
        <div style="color: #555555; font-size: 16px; line-height: 1.6;">
            <p><strong>Detalles del remitente:</strong></p>
            <ul style="list-style-type: none; padding-left: 0; background-color: #f8f9fa; padding: 15px; border-radius: 5px;">
                <li style="margin-bottom: 8px;"><strong>Nombre:</strong> {{ $contactData['fname'] }} {{ $contactData['lname'] }}</li>
                <li style="margin-bottom: 8px;"><strong>Correo:</strong> {{ $contactData['email'] }}</li>
                <li><strong>Teléfono:</strong> {{ $contactData['phone'] ?? 'No proporcionado' }}</li>
            </ul>
            
            <p><strong>Mensaje:</strong></p>
            <div style="background-color: #f8f9fa; padding: 15px; border-radius: 5px; border-left: 4px solid #f88f01;">
                <p style="margin: 0;">{!! nl2br(e($contactData['message'])) !!}</p>
            </div>
            
        </div>
    </div>
</body>
</html>

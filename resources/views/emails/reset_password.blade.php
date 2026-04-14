<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Restablecer contraseña - FerreMax</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 30px; border-radius: 8px; margin-top: 40px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
        <div style="text-align: center; margin-bottom: 20px;">
            <h1 style="color: #212529; font-size: 28px; margin: 0;">FerreMax<span style="color: #f88f01;">.</span></h1>
        </div>
        <div style="color: #555555; font-size: 16px; line-height: 1.6;">
            <p>Hola,</p>
            <p>Recibes este correo electrónico porque hemos recibido una solicitud para restablecer la contraseña de tu cuenta.</p>
            
            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ url('reset-password', $token) . '?email=' . urlencode($email) }}" style="background-color: #3b5d50; color: #ffffff; padding: 14px 28px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;">
                    Restablecer Contraseña
                </a>
            </div>

            <p>Este enlace para restablecer la contraseña caducará en 60 minutos.</p>
            <p>Si no solicitaste un restablecimiento de contraseña, no es necesario que realices ninguna acción.</p>
            
            <p style="margin-top: 30px;">
                Saludos cordiales,<br>
                El equipo de FerreMax
            </p>
        </div>
        <hr style="border: none; border-top: 1px solid #eeeeee; margin: 30px 0 20px;">
        <div style="color: #999999; font-size: 12px; text-align: center;">
            <p>Si tienes problemas haciendo clic en el botón "Restablecer Contraseña", copia y pega la siguiente URL en tu navegador web:</p>
            <p style="word-break: break-all; color: #3b5d50;">
                <a href="{{ url('reset-password', $token) . '?email=' . urlencode($email) }}" style="color: #3b5d50;">{{ url('reset-password', $token) . '?email=' . urlencode($email) }}</a>
            </p>
        </div>
    </div>
</body>
</html>

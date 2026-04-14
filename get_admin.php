<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

$admin = User::first();
if (!$admin) {
    echo "No admin found. Creating one...\n";
    $admin = User::create([
        'name' => 'Admin',
        'last_name' => 'System',
        'user' => 'admin',
        'password' => Hash::make('password123'),
        'deleted' => 0
    ]);
    echo "Admin created! User: admin | Pass: password123\n";
} else {
    echo "Existing Admin user field: " . $admin->user . "\n";
    // Si queremos podemos forzarle la contraseña para asegurar acceso
    $admin->password = Hash::make('password123');
    $admin->save();
    echo "Password forced to: password123\n";
}

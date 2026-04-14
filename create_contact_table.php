<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

if (!Schema::hasTable('contact_messages')) {
    Schema::create('contact_messages', function (Blueprint $table) {
        $table->id();
        $table->string('fname');
        $table->string('lname')->nullable();
        $table->string('email');
        $table->string('phone')->nullable();
        $table->text('message');
        $table->timestamps();
    });
    echo "Tabla 'contact_messages' creada con éxito.\n";
} else {
    echo "La tabla ya existe.\n";
}

<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

Schema::table('sales', function (Blueprint $table) {
    if(Schema::hasColumn('sales', 'delivery_id')) {
        DB::statement('ALTER TABLE sales MODIFY delivery_id BIGINT UNSIGNED NULL;');
    }
});
echo "sales table constraints modified.\n";

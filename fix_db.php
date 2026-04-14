<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

DB::statement('ALTER TABLE categories DROP COLUMN parent_id;');
DB::statement('ALTER TABLE categories ADD COLUMN parent_id INT(11) DEFAULT NULL;');

echo "Fixed schema!\n";

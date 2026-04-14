<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class UpdateImagesSeeder extends Seeder
{
    public function run()
    {
        Product::query()->update(['image' => 'products/default.png']);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class HardwareStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Limpiamos los productos anteriores opcionalmente o solo agregamos.
        // Product::truncate();

        // Aseguramos que existan la categoría principal y marca principal
        $category = Category::firstOrCreate(['name' => 'Herramientas']);
        $brand = Brand::firstOrCreate(['name' => 'Generico']);

        // Crear directorio si no existe
        if (!Storage::disk('public')->exists('products')) {
            Storage::disk('public')->makeDirectory('products');
        }

        $herramientas = [
            'Martillo Carpintero con Mango de Goma',
            'Taladro Percutor Inalámbrico 20V',
            'Juego de Destornilladores 10 Piezas',
            'Llave Inglesa Ajustable 12 Pulgadas',
            'Sierra Circular Eléctrica de 7 1/4"',
            'Wincha de Medir 5 Metros',
            'Nivel de Aluminio Profesional 24"',
            'Alicate de Presión Recto',
            'Cúter Industrial Cuchilla Retráctil',
            'Esmeril Angular 4 1/2" 850W',
            'Pala Punta Huevo con Mango de Madera',
            'Carretilla Contratista 3 Pies',
            'Brocha de Cerdas Naturales 4"',
            'Rodillo para Pintar Antigota 9"',
            'Flexómetro Profesional Laser 20m',
            'Lijadora Orbital de 1/3 de Hoja',
            'Soporte Magnético para Herramientas',
            'Gato Hidráulico de Botella 2 Ton',
            'Rotomartillo SDS Plus 1.5J',
            'Cautín Soldador Eléctrico 30W'
        ];

        // Copiamos una imagen de diseño a los nombres deseados
        // Se asume que en public/assets/furni/images existe un placeholder (usamos cross.svg temporalmente si no hay otra, o la imagen de un producto existente).
        $sourceImage = public_path('assets/furni/images/couch.png');

        foreach ($herramientas as $index => $herramienta) {
            $imageName = 'ejemplo' . ($index + 1) . '.jpg';
            $destPath = storage_path('app/public/products/' . $imageName);

            // Copiamos el archivo físico para que exista en el disco
            if (file_exists($sourceImage) && !file_exists($destPath)) {
                copy($sourceImage, $destPath);
            }

            Product::create([
                'category_id' => $category->id,
                'brand_id'    => $brand->id,
                'name'        => $herramienta,
                'code'        => 'HRT-' . str_pad($index + 1, 4, '0', STR_PAD_LEFT),
                'price'       => rand(15, 450) + (rand(0, 99) / 100),
                'stock'       => rand(10, 100),
                'description' => 'Herramienta de alta calidad para trabajos pesados en el hogar o construcción.',
                'image'       => 'products/' . $imageName,
            ]);
        }
    }
}

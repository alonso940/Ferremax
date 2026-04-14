<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Limpiar tablas
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::truncate();
        Category::truncate();
        Brand::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 2. Marcas por categoría principal
        $brandsData = [
            'Ferretería general' => ['Truper', 'Stanley', 'Fixser', 'Sika', '3M', 'Fischer', 'Hilti', 'Redline', 'Pretul'],
            'Electricidad' => ['Schneider Electric', 'BTicino', 'Legrand', 'Siemens', 'General Electric', 'Philips', 'Osram', 'Indeco', 'Nexans'],
            'Herramientas' => ['Bosch', 'Makita', 'DeWalt', 'Stanley', 'Truper', 'Black & Decker', 'Milwaukee', 'Total', 'Ingco', 'Hyundai'],
            'Gasfitería' => ['Pavco', 'Nicoll', 'Tigre', 'Rotoplas', 'Vainsa', 'Italgrif', 'FV', 'Coflex', 'Urrea'],
            'Pinturas y acabados' => ['Tekno', 'CPP', 'Pato', 'Vencedor', 'American Colors', 'Fast', 'Ecocolor'],
            'Iluminación' => ['Philips', 'Osram', 'Ledvance', 'Sylvania', 'Opalux', 'Bticino', 'Schneider', 'Halux']
        ];

        // Guardar IDs de marcas por categoría
        $categoryBrandsMap = [];
        foreach ($brandsData as $categoryName => $brands) {
            $brandIds = [];
            foreach ($brands as $brandName) {
                // Como algunas marcas se repiten entre categorías, usamos firstOrCreate
                $brand = Brand::firstOrCreate(['name' => $brandName]);
                $brandIds[] = $brand->id;
            }
            $categoryBrandsMap[strtolower($categoryName)] = $brandIds;
        }

        // 3. Estructura de categorías y productos
        $catalog = [
            'Ferretería general' => [
                'Accesorios de fijación' => [
                    'Pernos, tuercas y arandelas', 'Tornillos para madera', 'Tornillos para metal', 'Tarugos', 'Clavos uso general', 'Clavos de Albañil', 'Fijaciones para Drywall', 'Armellas y alcayatas', 'Remaches'
                ],
                'Ganchos y cintas' => [
                    'Ganchos adhesivos', 'Cintas de doble contacto', 'Cintas antideslizantes'
                ],
                'Cerraduras y cajas fuertes' => [
                    'Manijas y chapas de puerta', 'Cerraduras para puerta principal', 'Cerraduras digitales', 'Cajas fuertes', 'Candados'
                ]
            ],
            'Electricidad' => [
                'Cables eléctricos y accesorios' => [
                    'Cables coaxiales y conectores', 'Cables de red y conectores', 'Cables libres de halógenos', 'Cables THW', 'Cables TW', 'Cables vulcanizados', 'Otros cables eléctricos', 'Cintas aislantes'
                ],
                'Interruptores y Tomacorrientes' => [
                    'Enchufes', 'Enchufes inteligentes', 'Adaptadores', 'Interruptores', 'Interruptores inteligentes', 'Placas armadas', 'Placas modulares'
                ],
                'Seguridad' => [
                    'Alarmas y sensores', 'Videoporteros e intercomunicadores', 'Videoporteros inteligentes', 'Cámaras de seguridad', 'Cámaras de seguridad WiFi'
                ],
                'Linternas, pilas y batería' => [
                    'Linternas', 'Pilas y Baterías'
                ],
                'Tableros y llaves termomagnéticas' => [
                    'Tableros', 'Interruptores termomagnéticos', 'Interruptores diferenciales', 'Temporizadores y timers'
                ],
                'Extensiones' => [
                    'Extensiones domésticas', 'Extensiones industriales'
                ]
            ],
            'Herramientas' => [
                'Herramientas manuales' => [
                    'Dados', 'Cajas de herramientas', 'Sets de herramientas', 'Alicates', 'Cuchillas y navajas', 'Destornilladores', 'Tornillos de banco, tecles y prensas', 'Engrapadoras y remachadoras', 'Serruchos y arcos de sierra', 'Formones, escofinas y limas', 'Martillos y Combas', 'Espátulas y badilejos'
                ],
                'Herramientas para instalación de pisos' => [
                    'Cortadoras de cerámica', 'Crucetas y niveladores de piso', 'Raspines y fraguadores'
                ],
                'Herramientas de medición' => [
                    'Niveles', 'Niveles láser', 'Winchas', 'Multímetros', 'Escuadras', 'Calibradores'
                ],
                'Herramientas Eléctricas' => [
                    'Atornilladores', 'Llaves de impacto', 'Taladros', 'Rotomartillos', 'Martillos demoledores', 'Amoladoras y esmeriles', 'Sierras', 'Lijadoras', 'Cepilladoras de madera', 'Pulidoras', 'Pistolas de calor', 'Pistolas de silicona', 'Cautines y accesorios', 'Pistolas de clavos', 'Sopladores de aire'
                ],
                'Equipos de protección personal' => [
                    'Respiradores y mascarillas', 'Zapatos de seguridad', 'Protectores auditivos y visuales', 'Ropa de trabajo industrial', 'Cascos de seguridad', 'Guantes de seguridad', 'Arneses y fajas industriales'
                ]
            ],
            'Gasfitería' => [
                'Tubos y conexiones' => [
                    'Tubos de agua y accesorios', 'Tubos de desagüe y accesorios', 'Accesorios galvanizados', 'Pegamentos para PVC'
                ],
                'Bombas de agua' => [
                    'Motobombas', 'Bombas centrífugas', 'Bombas periféricas', 'Bombas presurizadoras', 'Bombas sumergibles', 'Bombas jet', 'Tanques hidroneumáticos'
                ],
                'Instalaciones de baño' => [
                    'Trampas y desagües', 'Tubos de abasto', 'Accesorios sanitarios'
                ],
                'Válvulas y llaves de agua' => [
                    'Llaves de agua', 'Válvulas PVC', 'Válvulas esféricas', 'Válvulas check', 'Válvulas de compuerta', 'Uniones universales'
                ],
                'Purificadores de agua y filtros' => [
                    'Purificadores de cocina', 'Filtros de lavadora y terma', 'Filtros de ducha', 'Filtros de refrigeradora y cafetera', 'Filtros para tanque de agua', 'Repuestos de purificadores y filtros'
                ],
                'Grifería' => [
                    'Grifería para lavatorio', 'Grifería para ducha', 'Llaves para lavadero'
                ],
                'Accesorios de gasfitería' => [
                    'Sumideros y registros', 'Otros accesorios de gasfitería'
                ]
            ],
            'Pinturas y acabados' => [
                'Pinturas látex' => [
                    'Pinturas Tekno', 'Pinturas CPP', 'Pinturas Pato', 'Pinturas Vencedor', 'Pinturas American Colors', 'Pinturas Fast', 'Pinturas Ecocolor'
                ],
                'Esmaltes y solventes' => [
                    'Sprays y aerosoles', 'Lacas', 'Barnices', 'Esmaltes y óleos', 'Anticorrosivos y zincromatos', 'Disolventes'
                ],
                'Herramientas para pintar' => [
                    'Rodillos y Bandejas', 'Lijas', 'Brochas', 'Otros accesorios para pintar', 'Compresoras de aire'
                ],
                'Productos para resanar y empastar' => [
                    'Impermeabilizantes', 'Imprimantes', 'Selladores, temples y masillas'
                ]
            ],
            'Iluminación' => [
                'Iluminación interior' => [
                    'Guirnaldas de luces para interior', 'Paneles LED', 'Spots LED', 'Ventiladores de techo', 'Tiras LED'
                ],
                'Iluminación exterior' => [
                    'Guirnaldas de luces para exterior', 'Reflectores LED', 'Reflectores halógenos', 'Apliques exteriores', 'Faroles', 'Estacas para Jardín'
                ],
                'Iluminación Smart' => [
                    'Focos smart', 'Plafones LED smart', 'Tiras LED', 'Interruptores inteligentes'
                ],
                'Lámparas decorativas' => [
                    'Lámparas de techo', 'Lámparas de escritorio', 'Lámparas de mesa', 'Lámparas de pie', 'Iluminación infantil'
                ],
                'Focos' => [
                    'Focos LED', 'Focos inteligentes', 'Fluorescentes y tubos LED', 'Dicroicos'
                ]
            ]
        ];

        foreach ($catalog as $mainName => $subcategories) {
            // Crear Categoría Principal
            $mainCategory = Category::create([
                'name' => $mainName,
                'parent_id' => null
            ]);

            // Obtener las marcas de esta categoría principal
            $availableBrands = $categoryBrandsMap[strtolower($mainName)] ?? [];

            foreach ($subcategories as $subName => $subSubcategories) {
                // Crear Subcategoría (Nivel 2)
                $subCategory = Category::create([
                    'name' => $subName,
                    'parent_id' => $mainCategory->id
                ]);

                foreach ($subSubcategories as $subSubName) {
                    // Crear Sub-Subcategoría (Nivel 3)
                    $subSubCategory = Category::create([
                        'name' => $subSubName,
                        'parent_id' => $subCategory->id
                    ]);

                    // Crear 5 Productos de Ejemplo al azar por cada Sub-Subcategoría
                    for ($i = 1; $i <= 5; $i++) {
                        // Seleccionar una marca al azar (si existe en esta categoría)
                        $brandId = !empty($availableBrands) ? $availableBrands[array_rand($availableBrands)] : 1; 

                        Product::create([
                            'name' => $subSubName . ' Modelo ' . $i,
                            'code' => 'PROD-' . strtoupper(Str::random(6)),
                            'description' => 'Descripción detallada para ' . $subSubName . ' versión ' . $i . '. Ideal para trabajos de precisión en construcción y ferretería.',
                            'category_id' => $subSubCategory->id,
                            'brand_id' => $brandId,
                            'price' => rand(10, 300) + (rand(0, 99) / 100),
                            'stock' => rand(5, 50),
                            'image' => 'products/default.png',
                        ]);
                    }
                }
            }
        }
    }
}

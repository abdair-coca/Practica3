<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = [
            [
                'name' => 'Electrónica',
                'description' => 'Productos tecnológicos como celulares, audífonos, cargadores y accesorios',
            ],
            [
                'name' => 'Ropa',
                'description' => 'Prendas de vestir para hombres, mujeres y niños',
            ],
            [
                'name' => 'Alimentos',
                'description' => 'Productos comestibles frescos, envasados o procesados',
            ],
            [
                'name' => 'Bebidas',
                'description' => 'Agua, jugos, gaseosas, cafés y otras bebidas',
            ],
            [
                'name' => 'Limpieza',
                'description' => 'Artículos para limpieza del hogar y cuidado de superficies',
            ],
            [
                'name' => 'Higiene personal',
                'description' => 'Productos para el cuidado personal como jabón, shampoo y pasta dental',
            ],
            [
                'name' => 'Lácteos',
                'description' => 'Leche, yogur, queso, mantequilla y derivados',
            ],
            [
                'name' => 'Carnes',
                'description' => 'Pollo, res, cerdo y otros productos de origen animal',
            ],
            [
                'name' => 'Frutas y verduras',
                'description' => 'Productos frescos de origen vegetal para consumo diario',
            ],
            [
                'name' => 'Panadería',
                'description' => 'Pan, galletas, tortas y otros productos horneados',
            ],
            [
                'name' => 'Congelados',
                'description' => 'Alimentos conservados a baja temperatura',
            ],
            [
                'name' => 'Snacks',
                'description' => 'Aperitivos, golosinas, papas fritas y chocolates',
            ],
            [
                'name' => 'Mascotas',
                'description' => 'Alimentos y accesorios para perros, gatos y otras mascotas',
            ],
        ];
        foreach ($categories as $data) {
            $data['slug'] = Str::slug($data['name']);
            Category::create($data);
        }
    }
}

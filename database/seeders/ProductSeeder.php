<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; 

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 6 productos de ejemplo, asignando company_id a cada uno
        $aRegister = [
            ['id'=>1, 'name'=>'Camiseta',       'description'=>'Descripcion del producto 1', 'price'=>10.00, 'image'=>'product-1.png', 'company_id'=>1],
            ['id'=>2, 'name'=>'Pantalon',       'description'=>'Descripcion del producto 2', 'price'=>20.00, 'image'=>'product-2.png', 'company_id'=>2],
            ['id'=>3, 'name'=>'Chaqueta',       'description'=>'Descripcion del producto 3', 'price'=>30.00, 'image'=>'product-3.png', 'company_id'=>3],
            ['id'=>4, 'name'=>'Bicicleta',      'description'=>'Descripcion del producto 4', 'price'=>40.00, 'image'=>'product-1.png', 'company_id'=>4],
            ['id'=>5, 'name'=>'Pantalon Corto', 'description'=>'Descripcion del producto 5', 'price'=>50.00, 'image'=>'product-1.png', 'company_id'=>5],
            ['id'=>6, 'name'=>'Pantalon Largo', 'description'=>'Descripcion del producto 6', 'price'=>60.00, 'image'=>'product-1.png', 'company_id'=>1],
        ];

        foreach ($aRegister as $register) {
            Product::updateOrCreate([ 'id' => $register['id'] ], $register);
        }
    }
}

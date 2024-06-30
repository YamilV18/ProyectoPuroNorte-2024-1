<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'tipo_producto'=>'Anticucho',
            'nombre'=>'Pollo',
            'descripcion'=>'Anticucho de Pollo',
            'precio'=>5.00
        ]);
        Product::create([
            'tipo_producto'=>'Anticucho',
            'nombre'=>'Carne',
            'descripcion'=>'Anticucho de Carne',
            'precio'=>6.00
        ]);
        Product::create([
            'tipo_producto'=>'Anticucho',
            'nombre'=>'Corazón',
            'descripcion'=>'Anticucho de Corazón',
            'precio'=>5.00
        ]);
        Product::create([
            'tipo_producto'=>'Anticucho',
            'nombre'=>'Molleja',
            'descripcion'=>'Anticucho de Molleja',
            'precio'=>5.00
        ]);
        Product::create([
            'tipo_producto'=>'Anticucho',
            'nombre'=>'Salchicha',
            'descripcion'=>'Anticucho de Salchicha',
            'precio'=>4.00
        ]);
        Product::create([
            'tipo_producto'=>'Anticucho',
            'nombre'=>'Chorizo',
            'descripcion'=>'Anticucho de Chorizo',
            'precio'=>6.00
        ]);
        //Otros
        Product::create([
            'tipo_producto'=>'Anticucho',
            'nombre'=>'Mixto',
            'descripcion'=>'Anticucho Mixto (Pollo, Carne, Corazón y Salchicha)',
            'precio'=>15.00
        ]);
        Product::create([
            'tipo_producto'=>'Anticucho',
            'nombre'=>'Especial',
            'descripcion'=>'Anticucho Especial (Pollo, Carne, Corazón, Chorizo y Salchicha)',
            'precio'=>20.00
        ]);
        //Bebidas
        Product::create([
            'tipo_producto'=>'Bebida',
            'nombre'=>'Gaseosa 2L',
            'descripcion'=>'Gaseosa de 2 litros',
            'precio'=>10.00
        ]);
        Product::create([
            'tipo_producto'=>'Bebida',
            'nombre'=>'Gaseosa 1 1/2L',
            'descripcion'=>'Gaseosa de 1 1/2 litros',
            'precio'=>8.00
        ]);
        Product::create([
            'tipo_producto'=>'Bebida',
            'nombre'=>'Gaseosa 1L',
            'descripcion'=>'Gaseosa de 1 litro',
            'precio'=>6.00
        ]);
        Product::create([
            'tipo_producto'=>'Bebida',
            'nombre'=>'Gaseosa 1/2L',
            'descripcion'=>'Gaseosa de 1/2 litros',
            'precio'=>4.00
        ]);
        Product::create([
            'tipo_producto'=>'Bebida',
            'nombre'=>'Gaseosa personal',
            'descripcion'=>'Gaseosa personal',
            'precio'=>2.00
        ]);
        Product::create([
            'tipo_producto'=>'Bebida',
            'nombre'=>'Agua mineral',
            'descripcion'=>'Agua mineral',
            'precio'=>1.50
        ]);
        Product::create([
            'tipo_producto'=>'Bebida',
            'nombre'=>'Mate',
            'descripcion'=>'Mate',
            'precio'=>2.00
        ]);
        Product::create([
            'tipo_producto'=>'Bebida',
            'nombre'=>'Café',
            'descripcion'=>'Café',
            'precio'=>2.50
        ]);
    }
}

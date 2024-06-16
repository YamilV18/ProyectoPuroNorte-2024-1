<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipo=$this->faker->randomElement(['Anticucho','Bebida']);
        $nombre=$this->faker->unique()->word(20);
        $descripcion=$this->faker->sentence(3);
        $precio=$this->faker->randomFloat(2,15,25);
        return [
            'tipo_producto'=>$tipo,
            'nombre'=>$nombre,
            'descripcion'=>$descripcion,
            'precio'=>$precio,
        ];
    }
}

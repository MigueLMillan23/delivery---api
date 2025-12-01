<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
{
    return [
        'nombre' => $this->faker->unique()->words(3, true),
        'descripcion' => $this->faker->sentence(),
        'precio' => $this->faker->randomFloat(2, 1, 1000),
        'stock' => $this->faker->numberBetween(0, 200),
    ];
}

}

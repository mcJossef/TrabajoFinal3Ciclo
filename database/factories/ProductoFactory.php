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
    public function definition(): array
    {
        return [
            'nombre' => fake()->text(45),
            'descripcion' => fake()->text(100),
            'precio' => fake()->randomFloat(2, 10, 100),
            'fecha_publicacion' => fake()->date(),
            'puntuacion' => fake()->numberBetween(1, 5),
            'id_categoria' => fake()->numberBetween(1, 11), // Asigna categorías existentes en tu base de datos.
            'id_estado_producto' => fake()->numberBetween(1, 2), // Asigna estados existentes en tu base de datos.
            'id_user' => fake()->numberBetween(1, 1), // Asigna usuarios existentes en tu base de datos.
        ];
    }
}

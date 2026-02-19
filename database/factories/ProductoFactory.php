<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition(): array
    {
        return [
            'nombre' => fake()->words(3, true),
            'descripcion' => fake()->optional()->paragraph(),
            'precio' => fake()->randomFloat(2, 1, 1000),
            'cantidad' => fake()->numberBetween(0, 1000),
            'categoria_id' => Categoria::factory(),
            'user_id' => User::factory(),
            'fotos' => [],
        ];
    }
}

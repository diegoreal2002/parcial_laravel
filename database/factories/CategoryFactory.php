<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    // Especificamos el modelo asociado a este factory
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word, // Genera un nombre aleatorio para la categoría
            'description' => $this->faker->sentence, // Genera una descripción aleatoria
            'is_active' => $this->faker->boolean, // Genera un valor booleano para el estado activo
        ];
    }
}

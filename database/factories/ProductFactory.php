<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 1, 100), // Precio entre 1 y 100
            'stock' => $this->faker->numberBetween(1, 100), // Stock entre 1 y 100
            'is_available' => $this->faker->boolean(),
            'expiration_date' => $this->faker->optional()->date(),
            'sku' => $this->faker->unique()->lexify('SKU-?????'),
        ];
    }
}

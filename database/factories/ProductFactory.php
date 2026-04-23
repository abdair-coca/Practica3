<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{

    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'category_id' => null,
            'name' => fake()->words(2, true),
            'sku' => fn(array $attributes) =>
            Str::slug($attributes['name']) . '-' . uniqid(),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 10, 500),
            'stock' => fake()->numberBetween(1, 20),
            'active' => true,
        ];
    }
}

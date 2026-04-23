<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => null,
            'status' => fake()->randomElement(['pending', 'processing', 'completed', 'cancelled']),
            'total' => 0,
            'notes' => fake()->sentence(),
            'ordered_at' => fake()->dateTimeBetween('-1 years', 'now'),
        ]; 
    }
}

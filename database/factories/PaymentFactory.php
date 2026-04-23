<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => null,
            'method' => fake()->randomElement(['cash', 'card','transfer']),
            'amount' => 0,
            'status'=> fake()->randomElement(['pending','completed','failed']),
            'paid_at' => null,
        ];
    }
}

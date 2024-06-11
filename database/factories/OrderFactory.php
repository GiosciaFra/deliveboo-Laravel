<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{

    protected $model = Order::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_name' => $this->faker->firstName,
            'customer_lastname' => $this->faker->lastName,
            'customer_address'  => $this->faker->address,
            'customer_email'  => $this->faker->safeEmail,
            'customer_phone' => $this->faker->randomNumber(9, true),
            'total_price'  => $this->faker->randomFloat(2, 10, 100),
            'restaurant_id' => $this->faker->randomNumber(1, true),
            'created_at' => $this->faker->dateTimeBetween('-12 months', 'now'),
        ];
    }
}

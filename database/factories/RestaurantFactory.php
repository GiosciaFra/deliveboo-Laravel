<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory
{
    protected $model = Restaurant::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'restaurant_name' => $this->faker->company,
            'address' => $this->faker->address,
            'image' => 'restaurant_images/QrKCbeGltuuX9sPrOli5yFnO7uRlpJC4B5pSpASP.png',
            'user_id' => \App\Models\User::factory()
        ];
    }
}

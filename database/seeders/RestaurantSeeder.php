<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = Restaurant::factory(9)->create();

        $types = Type::all();

        $restaurants->each(function ($restaurant) use ($types) {
            $restaurant->types()->attach(
                $types->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}

<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::factory(50)->create();

        $dishes = Dish::all();

        $orders->each(function ($order) use ($dishes) {
            $order->dishes()->attach(
                $dishes->random(rand(1, 4))->pluck('id')->toArray()
            );
        });
    }
}

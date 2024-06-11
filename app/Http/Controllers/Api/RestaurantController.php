<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with(['types', 'dishes', 'user'])->get();

        return response()->json([
            "success" => true,
            "results" => $restaurants,
        ]);
    }

    public function show($id) {
        $restaurant = Restaurant::with('types', 'dishes', 'user')->where('id', $id)->first();

        return response()->json([
            "success" => true,
            "restaurant" => $restaurant,
        ]);
    }

}

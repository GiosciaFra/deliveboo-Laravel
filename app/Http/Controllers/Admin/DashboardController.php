<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {

        $user = Auth::user();

        $restaurant = Restaurant::where('user_id', $user->id)->first();

        $types = Type::where('restaurant_id', $restaurant->id);

        return view('admin.index', compact('user', 'restaurant', 'types'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Restaurant;
use App\Http\Requests\StoreDishRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $restaurant = Restaurant::where('user_id', $user->id)->first();

        // Assumendo che ogni utente abbia un ristorante associato
        $restaurantId = auth()->user()->restaurant->id;
        // $restaurantId = auth()->user()->restaurant->id;
        $dishes = Dish::where('restaurant_id', $restaurantId)->orderBy('name')->get();

        return view('admin.dishes.index', compact('dishes', 'restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        $validated = $request->validated();
        $newDish = new Dish();

        //controllo che l'immagine esista
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('dish_images', $request->image);
            $newDish->fill($validated);

            $newDish->image = $path;
        } else {
            $newDish->fill($validated);
        }

        $newDish->restaurant_id = auth()->user()->restaurant->id;
        $newDish->viewable = $request->has('viewable');
        $newDish->save();

        return redirect()->route('admin.dishes.show', $newDish->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        if ($dish->restaurant_id != auth()->user()->restaurant->id) {
            abort(404);
        }

        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        if ($dish->restaurant_id != auth()->user()->restaurant->id) {
            abort(404);
        }

        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDishRequest $request, Dish $dish)
    {

        $validated = $request->validated();

        //controllo che l'immagine esista
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('dish_images', $request->image);
            $dish->fill($validated);

            $dish->image = $path;
        } else {
            $dish->fill($validated);
        }

        $dish->viewable = $request->has('viewable');
        $dish->save();

        return redirect()->route('admin.dishes.show', compact('dish'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        if ($dish->restaurant_id != auth()->user()->restaurant->id) {
            abort(404);
        }

        $dish->delete();
        return redirect()->route('admin.dishes.index');
    }
}

<?php

use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\Typecontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// rotta API per ristornati
Route::get('/restaurants', [RestaurantController::class, 'index']);
// rotta API per tipologie
Route::get('/types', [Typecontroller::class, 'index']);
// singolo ristorante
Route::get('/restaurants/{id}', [RestaurantController::class, 'show']);
// richieste nuovi ordini
Route::post('/new-order', [OrderController::class, 'store']);
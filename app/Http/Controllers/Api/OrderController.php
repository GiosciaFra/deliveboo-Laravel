<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewOrder;
use App\Mail\NewOrderAdmin;
use App\Models\Dish;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Validator;



class OrderController extends Controller
{

    public function index()
    {

        $user = Auth::user();

        $restaurant = Restaurant::where('user_id', $user->id)->first();

        $restaurantId = auth()->user()->restaurant->id;

        $orders = Order::where('restaurant_id', $restaurantId)->orderBy('created_at', 'DESC')->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        if ($order->restaurant_id != auth()->user()->restaurant->id) {
            abort(404);
        }

        $dishes = $order->dishes()->get();


        return view('admin.orders.show', compact('order', 'dishes'));
    }

    public function store(Request $request)
    {

        // validation
        $validator = Validator::make(
            $request->all(),
            [
                'customer_name' => ['required', 'string', 'max:255'],
                'customer_lastname' => ['required', 'string', 'max:255'],
                'customer_address' => ['required', 'max:255', 'string'],

                'customer_email' => ['required', 'string', 'lowercase', 'email', 'max:255'],

                'customer_phone' => ['required', 'min:8', 'max:10'],
            ],
            [
                'required' => 'Il campo: ":attribute" deve essere inserito per proseguire.',
                'max' => 'Il campo: ":attribute" deve contenere massimo :max caratteri.',
                'min' => 'Il campo: ":attribute" deve contenere minimo :min caratteri.',
                'unique' => 'Il campo: ":attribute" è già esistente',

                'lowercase' => 'Questo campo deve essere minuscolo.',
                'email' => 'Email non valida.',
            ],
            [
                'customer_name' => 'Nome',
                'customer_lastname' => 'Cognome',
                'customer_address' => 'Indirizzo',
                'customer_email' => 'E-Mail',
                'customer_phone' => 'Numero di telefono',
            ]
        );

        // if it fails
        if ($validator->fails()) {
            // return error message
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }


        $newOrder = new Order();

        // fill
        $newOrder->fill($request->all());
        $newOrder->save();



        $user = User::where('id', $newOrder->restaurant_id)->first();



        $newOrder->dishes()->attach($request->dishes);



        // Mail::to($newOrder->customer_email)->send(new NewOrder($newOrder));
        // Mail::to($user->email)->send(new NewOrderAdmin($newOrder));


        // respond to the customer here
        return response()->json([
            'success' => true,
            'message' => 'Richiesta di contatto inviata correttamente',
            'request' => $request->all()
        ]);
    }
}

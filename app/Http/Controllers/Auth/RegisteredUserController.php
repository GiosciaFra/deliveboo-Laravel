<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Type;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use function Laravel\Prompts\password;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {

        $types = Type::all();

        return view('auth.register', compact('types'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'phone_number' => ['required', 'min: 8', 'max:10'],
                'vat' => ['required', 'min:11', 'max:11', 'unique:' . User::class],


                'restaurant_name' => ['required', 'max:255', 'string'],
                'address' => ['required', 'max:255', 'string'],
                'image' => ['nullable', 'file', 'max:1024', 'mimes:jpg,png,jpeg'],

                'types' => ['required'],
            ],
            [
                'required' => 'Il campo: ":attribute" deve essere inserito per proseguire.',
                'max' => 'Il campo: ":attribute" deve contenere massimo :max caratteri.',
                'min' => 'Il campo: ":attribute" deve contenere minimo :min caratteri.',
                'unique' => 'Il campo: ":attribute" è già esistente',

                'email.lowercase' => 'Questo campo deve essere minuscolo.',
                'email.email' => 'Email non valida.',

                'image.mimes' => "Il formato dell'immagine non è supportato, inserisci un file: png, jpg, bmp o jpeg ",
                'image.max' => "Il file caricato è troppo grande. La dimensione massima consentita è di 1MB.",

                'types.required' => 'Seleziona almeno un campo.',

                'password.confirmed' => 'Assicurati che le password inserite siano uguali.',
            ],
            [
                'name' => 'Nome',
                'lastname' => 'Cognome',
                'email' => 'E-Mail',
                'password' => 'Password',
                'phone_number' => 'Numero di telefono',
                'vat' => 'P.IVA',

                'restaurant_name' => 'Nome ristorante',
                'address' => 'Indirizzo',
                'image' => 'Immagine',
            ]
        );


        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'vat' => $request->vat,
        ]);

        $path = Storage::disk('public')->put('restaurant_images', $request->image);

        $restaurant = Restaurant::create([
            'restaurant_name' => $request->restaurant_name,
            'address' => $request->address,
            'image' => $path,
            'user_id' => $user->id,
        ]);



        $restaurant->image = $path;

        $restaurant->types()->attach($request->types);

        event(new Registered($user, $restaurant));

        Auth::login($user);

        // Reindirizza alla vista del ristorante con i dati del ristorante
        return redirect(RouteServiceProvider::HOME);
    }
}

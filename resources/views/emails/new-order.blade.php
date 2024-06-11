
<h1 class="text-center">
    Grazie del tuo ordine, {{$order->customer_name}}!
</h1>


<h2 class="text-center">
    "{{$restaurant->restaurant_name}}" ha accettato il tuo ordine
</h2>

<div class="text-center">
    Il tuo ordine verrà spedito a: {{$order->customer_address}}
</div>

<div class="container">

    <div>
        <h4>Riepilogo ordine:</h4>

        <ul>
            @foreach($order->dishes as $dish)
            <li>
                {{ $dish->name }} - €{{ $dish->price }} x {{ $dish->pivot->where('dish_id', $dish->id)->where('order_id', $order->id)->first()->quantity}} = €{{ $dish->price *  $dish->pivot->where('dish_id', $dish->id)->where('order_id', $order->id)->first()->quantity}}
            </li>
            @endforeach
        </ul>
    </div>

    <div>
        <h4>Dati Ristorante:</h4>

        <ul>
            <li>
                Nome: {{$restaurant->restaurant_name}} 
            </li>
    
            <li>
                Indirizzo: {{$restaurant->address}} 
    
            </li>
            <li>
                N° di telefono: {{$user->phone_number}}   
    
            </li>
            <li>
                P.IVA: {{$user->vat}}   
    
            </li>
            <li>
                E-mail: {{$user->email}}   
    
            </li>
        </ul>
    </div>
    <p>
        <h4>Totale ordine:</h4>
        <ul>
            <li>
                € {{$order->total_price}}
            </li>
        </ul> 
    </p>
</div>



<style scoped>
    * {
        font-family: sans-serif;
    }

    .container {
        padding: 10px;
    }
    ul {
        list-style-type: none;
    }

    li {
        margin-bottom: 1em;
    }

    .text-center {
        text-align: center;
    }
    
</style>
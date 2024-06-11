
<h1 class="text-center">
    Hai ricevuto un nuovo ordine
</h1>

<div class="container">

    <h4>Dati cliente:</h4>
    <ul>
        <li> Nome: {{$order->customer_name}} </li>
        <li> Cognome: {{$order->customer_lastname}} </li>
        <li> Indirizzo: {{$order->customer_address}} </li>
        <li> Telefono: {{$order->customer_phone}} </li>
    </ul>
    
    
    <h4>Riepilogo ordine:</h4>
    
    <ul>
        @foreach($order->dishes as $dish)
        <li>
            {{ $dish->name }} - € {{ $dish->price }} x {{ $dish->pivot->where('dish_id', $dish->id)->where('order_id', $order->id)->first()->quantity}} = € {{ $dish->price *  $dish->pivot->where('dish_id', $dish->id)->where('order_id', $order->id)->first()->quantity}}
    
        </li>
        @endforeach
    </ul>
        
    
    <p>
        <h4>Totale ordine:</h4>
        <ul>
            <li>€ {{$order->total_price}}</li>
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
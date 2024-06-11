@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="page-title">
            <h2 class="title">Ciao {{$user->name}}!</h2>
        </div>
        <div class="rest-card">
            <div class="rest-card_img">
                <img src="{{'storage/' . $restaurant->image}}" alt="{{$restaurant->restaurant_name}}">
            </div>            
            <div class="rest-card_text ">
                <div class="rest-info">
                    <h3 class="">{{$restaurant->restaurant_name}}</h3>
                    <p>{{$restaurant->address}}</p>
                    <p>+39 {{$user->phone_number}}</p>
                    <p>P.IVA: {{$user->vat}}</p>
                    <div>Cucina:
                        @foreach ($restaurant->types as $type)
                        <div class="badge rounded-pill text-bg-secondary bt-2">{{$type->name}}</div>
                        @endforeach
                    </div>
                </div>
                <div class="rest-card_btn mt-3">
                    <a href="{{route('admin.dishes.index')}}" class="btn btn1">Menù</a>
                    <a href="{{route('admin.orders.index')}}" class="btn btn1">Ordini</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
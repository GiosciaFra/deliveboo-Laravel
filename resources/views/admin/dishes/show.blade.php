@extends('layouts.app')

@section('content')
<section>
    <div class="container">

        <div class="page-title">
            {{-- go back to the dish list --}}
            <a class="btn btn1" href="{{route('admin.dishes.index')}}"><i class="fa-solid fa-angle-left"></i> Menù</a>
            <h2 class="title">{{$dish->name}}</h2>
        </div>

        {{-- card --}}
        <div class="dish-card">
            <div class="dish-card_img">
                @if ($dish->image)
                <img src="{{ asset('storage/' . $dish->image) }}" alt="immagine piatto">
                @endif
            </div>            
            <div class="dish-card_text">
                <div class="dish-info"> 
                    <p><span class="title">Descrizione:</span><br>{{$dish->description}}</p>
                    <p><span class="title">Prezzo: </span>{{$dish->price}}€</p>
                    <p>
                        <span class="title">Disponibile: </span>
                        @if($dish->viewable == 1)
                        <i class="fa-regular fa-circle-check text-success "></i>
                        @else
                        <i class="fa-regular fa-circle-xmark text-danger "></i>
                        @endif
                    </p>
                </div>
                <div class="dish-card_btn">                   
                    {{-- edit --}}
                    <a class="btn btn1 mb-2" href="{{route('admin.dishes.edit', $dish)}}">Modifica</a>
                    
                    {{-- delete --}}
                    <button type="button" class="btn btn3 mb-2" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Elimina
                    </button>

                    <!-- delete modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteModalLabel">Elimina il piatto</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <div class="modal-body">
                                    Confermi l'eliminazione?
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn1" data-bs-dismiss="modal">Annulla</button>
                                    <form action="{{route('admin.dishes.destroy', $dish->id)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn3">Elimina</button>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

        

            </div>
        </div>
 
    </div>
</section>
@endsection
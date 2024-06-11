@extends('layouts.app')

@section('content')
<section>
    <div class="container"> 
        <div class="page-title">
            {{-- back to home --}}
            <a class="btn btn1" href="{{route('admin.')}}"><i class="fa-solid fa-angle-left"></i> Home</a>
            <h2 class="title">{{$restaurant->restaurant_name}}</h2>
        </div>

        <div class="box-list">

            <div class="box-title">
                <h2 class="fw-lighter">Menù</h2>
                {{-- add a new dish --}}
                <a class="btn btn1" href="{{route('admin.dishes.create')}}"><i class="fa-solid fa-plus"></i></a>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Piatto</th>
                    <th scope="col" class="text-center d-none d-md-table-cell">Prezzo</th>
                    <th scope="col" class="text-center d-none d-md-table-cell">Disponibilità</th>
                    <th scope="col" class="text-center text-nowrap">Modifica Piatto</th>
                    </tr>
                </thead>
                
                <tbody>
                    @forelse ($dishes as $dish)
                        <tr class="align-middle dish">
                            <td>
                                <a class="dish-name" href="{{route('admin.dishes.show', $dish)}}">{{$dish->name}}</a>
                            </td>
                            
                            <td class="text-center d-none d-md-table-cell">
                                € {{$dish->price}}
                            </td>

                            <td class="text-center d-none d-md-table-cell">
                                @if ($dish->viewable)
                                <i class="fa-regular fa-circle-check text-success "></i>
                                @else
                                <i class="fa-regular fa-circle-xmark text-danger "></i>
                                @endif
                            </td>

                            <td class="text-center">
                                <a class="mod-del" href="{{route('admin.dishes.edit', $dish)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>                 
                        </tr>
                    @empty
                        <tr>
                            <td>Nessun piatto inserito</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
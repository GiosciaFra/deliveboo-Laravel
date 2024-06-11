@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">{{ __('Registrati') }}</div>

                <div class="card-body mt-3 mx-4">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" id="myform">
                        @csrf

                        <div class="d-flex justify-content-end mb-4 text-warning ">
                            I campi cotrassegnati con " * " sono obbligatori
                        </div>

                        <h2 class="mb-3">
                            Dati titolare
                        </h2>

                        {{-- name --}}
                        <div class="mb-4 row ">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Nome *') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        {{-- lastname --}}
                        <div class="mb-4 row ">
                            <label for="lastname" class="col-md-3 col-form-label text-md-right">{{ __('Cognome *') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- email --}}
                        <div class="mb-4 row ">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail *') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- phone_number --}}
                        <div class="mb-4 row ">
                            <label for="phone_number" class="col-md-3 col-form-label text-md-right">{{ __('Numero di telefono *') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="number" min="0" oninput="this.value = this.value.slice(0, 10)" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">

                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- vat --}}
                        <div class="mb-4 row ">
                            <label for="vat" class="col-md-3 col-form-label text-md-right">{{ __('Partita IVA *') }}</label>

                            <div class="col-md-6">
                                <input id="vat" type="number" min="0" oninput="this.value = this.value.slice(0, 11)" class="form-control @error('vat') is-invalid @enderror" name="vat" value="{{ old('vat') }}" required autocomplete="vat">

                                @error('vat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                       
                        {{-- password form --}}
                        <div class="mb-4 row ">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password *') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" minlength="8" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-5 row ">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Conferma Password *') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div id="password-error" class="invalid-feedback text-center " style="display: none;">
                                Assicurati che le password siano uguali
                            </div>
                        </div>



                        {{-- DATI RISTORANTE --}}

                        <h2 class="mb-5">
                            Dati ristorante
                        </h2>

                        {{-- restaurant_name --}}
                        <div class="mb-4 row ">
                            <label for="restaurant_name" class="col-md-3 col-form-label text-md-right">{{ __('Nome ristorante *') }}</label>

                            <div class="col-md-6">
                                <input id="restaurant_name" type="text" class="form-control @error('restaurant_name') is-invalid @enderror" name="restaurant_name" value="{{ old('restaurant_name') }}" required autocomplete="restaurant_name" autofocus>

                                @error('restaurant_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- address --}}
                        <div class="mb-4 row ">
                            <label for="address" class="col-md-3 col-form-label text-md-right">{{ __('Indirizzo *') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- restaurant image --}}
                        <div class="mb-4 row ">
                            <label for="image" class="col-md-3 col-form-label text-md-right">{{ __('Immagine *') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>
                                <small>formati supportati: jpeg, jpg, png</small>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- restaurant types --}}
                        <div class="mb-4 row ">
                            <label for="types" class="col-md-3 col-form-label text-md-right">{{ __('Tipo di cucina *') }}</label>

                            <div class="d-flex gap-3 flex-wrap  @error('types') is-invalid @enderror">
                                @foreach($types as $type)
                                <div class="form-check">
                                    <input 
                                    type="checkbox" 
                                    name="types[]"
                                    value="{{$type->id}}" 
                                    class="form-check-input @error('types') is-invalid @enderror" 
                                    id="type-{{$type->id}}"
                                    {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}
                                    > 
        
                                    <label for="type-{{$type->id}}" class="form-check-label">{{$type->name}}</label>
        
                                </div>
                                @endforeach

                            </div>
                            @error('types')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div id="type-error" class="invalid-feedback text-center " style="display: none;">
                                Seleziona almeno un tipo di cucina.
                            </div>
                            

                        </div>

                        <div class="alert alert-warning" role="alert">
                            Una volta inseriti, i dati non potranno essere cambiati, vi preghiamo di assicurarvi che siano corretti.
                        </div>


                        {{-- submit --}}
                        <div class="mb-4 row  mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const form = document.getElementById('myform');

    const checkboxes = form.querySelectorAll('input[type="checkbox"]');
    let errorDiv = document.getElementById('type-error');

   
    form.addEventListener('submit', function(event) {

        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('password-confirm').value;
        let errorPsw = document.getElementById('password-error');


        //checkboxes
        let isChecked = false;
        for (let checkbox of checkboxes) {
            if (checkbox.checked) {
                isChecked = true;
                break;
            }
        }

        if (password !== confirmPassword) {
            errorPsw.style.display = 'block';
            event.preventDefault();
        }else {
            errorPsw.style.display = 'none';
        }



        if (!isChecked) {
            event.preventDefault();
            errorDiv.style.display = 'block';
        }else {
            errorDiv.style.display = 'none';
        }

    });

    
</script>

@endsection

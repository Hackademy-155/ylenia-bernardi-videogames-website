<x-layout>
    <div class="container py-5">
        <div class="row mb-4 text-center">
            <div class="col-12">
                <h2 class="mb-4">
                    Dettagli dell'accessorio: {{$accessory->name}}
                </h2>
            </div>
        </div>
        @if (session('message'))
        <div class="d-flex justify-content-center mt-3">
            <div class="alert alert-success text-center">
                {{ session('message') }}
            </div>
        </div>
        @endif
        <div class="row gy-4">
            <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                <img src="{{ Storage::url($accessory->photo) }}" class="img-fluid" style="max-height: 420px; object-fit: cover;">
            </div>
            <div class="col-12 col-md-6">
                <div class="bg-light p-4 rounded shadow-sm w-100">
                    <h3 class="mb-3 text-secondary">{{$accessory->name}}</h3>
                    <div class="mb-3">
                        <h5>Descrizione:</h5>
                        <p>{{$accessory->description}}</p>
                    </div>
                    <div class="row mb-2">
                        <div class="d-flex align-items-center mb-2">
                            <h5 class="me-2 mb-0">Produttori:</h5>
                            <p class="mb-0 text-muted">{{$accessory->brand}}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <h5 class="me-2 mb-0">Prezzo:</h5>
                        <p class="mb-0">${{$accessory->price}}</p>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        @if($accessory->user_id)
                        <p class="me-2 mb-0 text-secondary fs-6 fw-light ms-auto">
                            Caricato da: <a href="#" class="text-reset">{{$accessory->user->name}}</a>
                        </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center pt-5 d-flex gap-5">
            @auth
            <div class="rating mb-4">
                <p class="text-secondary">
                    Valuta questo gioco!
                </p>
                <input value="5" name="rating" id="star5" type="radio">
                <label for="star5"></label>
                <input value="4" name="rating" id="star4" type="radio">
                <label for="star4"></label>
                <input value="3" name="rating" id="star3" type="radio">
                <label for="star3"></label>
                <input value="2" name="rating" id="star2" type="radio">
                <label for="star2"></label>
                <input value="1" name="rating" id="star1" type="radio">
                <label for="star1"></label>
            </div>
            @if (Auth::user())
            <div class="d-flex flex-column align-items-center mb-4">
                <p class="text-secondary">
                    Vorresti modificare le info riguardo questo articolo? 
                </p>
                <a href="{{route('accessory.edit', $accessory)}}" class="btn btn-warning">Modifica Articolo</a>
            </div>
            <livewire:delete-accessory :accessory="$accessory"/>
            @endif
            @else
            <div class="d-flex flex-column align-items-center">
                <p class="text-secondary mb-4">
                    Effettua l'accesso per valutare, modificare o eliminare questo gioco.
                </p>
                <a href="{{route('login')}}" class="btn btn-primary">Accedi</a>
            </div>
            @endauth
        </div>
    </div>
</x-layout>

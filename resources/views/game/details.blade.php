<x-layout>
    <div class="container py-5">
        <div class="row mb-4 text-center">
            <div class="col-12">
                <h2 class="mb-4">
                    {{$game->title}}
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
                <img src="{{Storage::url($game->cover)}}" class="img-fluid rounded shadow">
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                <div class="bg-light p-4 rounded shadow-sm w-100">
                    <h3 class="mb-3 text-secondary">Dettagli</h3>
                    <div class="mb-3">
                        <h5>Descrizione:</h5>
                        <p>{{$game->description}}</p>
                    </div>
                    <div class="row mb-2"> 
                        <div class="d-flex align-items-center mb-2">
                            <h5 class="me-2 mb-0">Produttori:</h5>
                            <p class="mb-0 text-muted">{{$game->producer}}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-2"> 
                        <h5 class="me-2 mb-0">Prezzo:</h5>
                        <p class="mb-0">${{$game->price}}</p>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        @if($game->user_id)
                            <p class="me-2 mb-0 text-secondary fs-6 fw-light ms-auto">
                                Caricato da: <a href="#" class="text-reset">{{$game->user->name}}</a>
                            </p>
                        @endif
                    </div>                    
                </div>
            </div>
            <div class="text-center pt-5 d-flex justify-content-around">
                @auth
                    <div class="rating">
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
                    @if (Auth::user() && Auth::user()->id == $game->user_id)
                        <div class="d-flex flex-column align-items-center">
                            <p class="text-secondary">
                                Vorresti modificare le info riguardo questo gioco? 
                            </p>
                            <a href="{{route('game.edit', $game)}}" class="btn btn-warning">Modifica Gioco</a>
                        </div>
                        <div class="d-flex flex-column align-items-center">
                            <p class="text-secondary">
                                Vorresti eliminare questo gioco?
                            </p>
                            <form action="{{route('game.delete', $game)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Elimina Gioco</button>
                            </form>
                        </div>
                    @endif
                @else
                    <div class="d-flex flex-column align-items-center">
                        <p class="text-secondary">
                            Effettua l'accesso per valutare, modificare o eliminare questo gioco.
                        </p>
                        <a href="{{route('login')}}" class="btn btn-primary">Accedi</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
    <x-footer/>
</x-layout>

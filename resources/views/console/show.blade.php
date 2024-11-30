<x-layout>
    <div class="container py-5 d-flex justify-content-center align-items-center">
        <div class="row mb-4 text-center w-100">
            <div class="col-12">
                <h2 class="mb-4">
                    {{$console->name}}
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
        <div class="row gy-4 w-100">
            <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                <img src="{{Storage::url($console->photo)}}" class="h-20">
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center align-items-center flex-column">
                <div class="text-center">
                    <img src="{{Storage::url($console->logo)}}" class="img-fluid" style="max-width: 130px;">
                </div>
                <div class="bg-box p-4 rounded shadow-sm w-100">
                    <h3 class="mb-3 text-secondary">Dettagli</h3>
                    <div class="mb-3">
                        <h5>Descrizione:</h5>
                        <p>{{$console->description}}</p>
                    </div>
                    <div class="row mb-2"> 
                        <div class="d-flex align-items-center mb-2">
                            <h5 class="me-2 mb-0">Produttori:</h5>
                            <p class="mb-0 text-muted">{{$console->brand}}</p>
                        </div>
                    </div>
                    <div class="row mb-2"> 
                        <div class="d-flex align-items-center mb-2">
                            <h5 class="me-2 mb-0">Data di uscita:</h5>
                            <p class="mb-0 text-secondary">
                                @if($console->released)
                                    {{ date('d F Y', strtotime($console->released)) }}
                                @else
                                    Dato non disponibile
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-2"> 
                        <h5 class="me-2 mb-0">Prezzo:</h5>
                        <p class="mb-0">${{$console->price}}</p>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        @if($console->user_id)
                        <p class="me-2 mb-0 text-secondary fs-6 fw-light ms-auto">
                            Caricato da: <a href="#" class="text-reset">{{$console->user->name}}</a>
                        </p>
                        @endif
                    </div>                    
                </div>
            </div>
            <div class="text-center pt-5 d-flex justify-content-around">
                @auth
                <div class="rating">
                    <p class="text-secondary">
                        Valuta questa console!
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
                    <div class="d-flex flex-column align-items-center">
                        <p class="text-secondary">
                            Vorresti modificare le info riguardo questa console? 
                        </p>
                        <a href="{{route('console.edit', $console)}}" class="btn btn-warning">Modifica Console</a>
                    </div>
                    <div class="d-flex flex-column align-items-center">
                        <p class="text-secondary">
                            Vorresti eliminare questa console?
                        </p>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConsoleModal">
                            Elimina Console
                        </button>
                    </div>
                    <div class="modal fade" id="deleteConsoleModal" tabindex="-1" aria-labelledby="deleteConsoleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteConsoleModalLabel">Eliminazione Console</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Sei sicuro di voler eliminare questa console?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                    <form action="{{route('console.delete', $console)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Elimina Console</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                <div class="d-flex flex-column align-items-center">
                    <p class="text-secondary">
                        Effettua l'accesso per valutare, modificare o eliminare questa console.
                    </p>
                    <a href="{{route('login')}}" class="btn btn-primary">Accedi</a>
                </div>
                @endauth
            </div>
            <div>
                @if (count($console->games))
                    <div class="row mb-4 text-center mt-5">
                        <div class="col-12">
                            <h3 class="mb-4">Giochi disponibili per questa console</h3>
                        </div>
                    </div>
                    <div class="container mt-5">
                        <div class="row justify-content-center g-3">
                            @foreach($games as $game)
                            <div class="col-12 col-md-4 my-4">
                                <x-card :game="$game"/>
                            </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="row col-12 text-center text-secondary mb-5" style="margin-top: 30px">
                        <i class="bi bi-emoji-grimace fs-1"></i>
                        <h4>Non è presente alcun gioco per questa console.</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>

</x-layout>

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
                    @if($game->price == 0)
                    <div class="d-flex align-items-center mb-2"> 
                        <h5 class="me-2 mb-0">Prezzo:</h5>
                        <p class="mb-0">Free to Play</p>
                    </div>
                    @else
                    <div class="d-flex align-items-center mb-2"> 
                        <h5 class="me-2 mb-0">Prezzo:</h5>
                        <p class="mb-0">${{$game->price}}</p>
                    </div>
                    @endif
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
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Elimina Gioco
                    </button>
                </div>
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Eliminazione Gioco</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Sei sicuro di voler eliminare questo gioco?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                <form action="{{route('game.delete', $game)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Elimina Gioco</button>
                                </form>
                            </div>
                        </div>
                    </div>
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
            <div>
                @if (count($game->consoles))
                <div class="row mb-4 text-center mt-5">
                    <div class="col-12">
                        <h3 class="mb-4">Consoles disponibili per questo gioco</h3>
                    </div>
                </div>
                <div class="container mt-5">
                    <div class="row justify-content-center g-3">
                        @foreach($consoles as $console)
                        <div class="col-md-2 col-4 text-center">
                            <div class="console-img-wrapper">
                                @php
                                $images = [
                                7 => ['original' => 'media/ps4.svg', 'hover' => 'media/ps4-blue.svg'],
                                8 => ['original' => 'media/ns.svg', 'hover' => 'media/ns-blue.svg'],
                                9 => ['original' => 'media/xboxX.png', 'hover' => 'media/xboxX-blue.png'],
                                10 => ['original' => 'media/playstation5.svg', 'hover' => 'media/playstation5-blue.svg'],
                                11 => ['original' => 'media/xboxS.svg', 'hover' => 'media/xboxS-blue.svg']
                                ];
                                $imagePath = $images[$console->id]['original'] ?? 'default/sad-face.png'; 
                                $hoverImagePath = $images[$console->id]['hover'] ?? 'default/sad-face.png'; 
                                @endphp
                                <a href="{{ route('console.show', $console) }}" class="d-block text-decoration-none text-black">
                                    <img src="{{ asset($imagePath) }}" alt="{{ $console->name }}" class="img-fluid console-img original-img" style="max-height: 100px; max-width: 100px;" data-hover="{{ asset($hoverImagePath) }}">
                                    <h6 class="console-name mt-3">{{ $console->name }}</h6>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="row col-12 text-center text-secondary mb-5" style="margin-top: 30px">
                    <i class="bi bi-emoji-grimace fs-1"></i>
                    <h4>Non è presente alcuna console per questo gioco.</h4>
                </div>
                @endif
            </div>       
        </div>
    </div>
    <x-footer/>
</x-layout>

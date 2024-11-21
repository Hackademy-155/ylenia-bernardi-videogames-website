<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mt-5 mb-0 pb-3 text-center">Dashboard di {{ Auth::user()->name }}</h1>
                <p style="color: rgba(0, 0, 0, 0.35);">
                    La lista dei tuoi giochi. Clicca su un gioco per tornare alla sua pagina dettaglio...
                </p>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            @if(Auth::user()->game->isNotEmpty())
            @foreach (Auth::user()->game as $game)
                <div class="row gy-4 justify-content-center position-relative">
                    <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                        <img src="{{Storage::url($game->cover)}}" class="img-fluid rounded shadow">
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                        <div class="bg-light p-4 rounded shadow-sm w-100">
                            <h3 class="mb-3 text-secondary text-center">Dettagli</h3>
                            <div class="mb-3">
                                <h5>Descrizione:</h5>
                                <p>{{$game->description}}</p>
                            </div>
                            <div class="row mb-2"> 
                                <div class="col-2">
                                    <h5>Produttori:</h5>
                                </div>
                                <div class="col-8">
                                    <p class="mb-0 text-muted">{{$game->producer}}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-2"> 
                                <h5 class="me-2 mb-0">Prezzo:</h5>
                                <p class="mb-0">${{$game->price}}</p>
                            </div>                  
                        </div>
                    </div>
                </div>
            @endforeach
            @else
                <div class="col-12 text-center text-secondary">
                    <p>Non hai giochi associati al tuo account.</p>
                </div>
            @endif
        </div>
    </div>
    <x-footer/>
</x-layout>
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
            <div class="alert alert-success">
                {{session('message')}}
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
                    <div class="row mb-3">
                        <div class="col-2">
                            <h5>Produttori:</h5>
                        </div>
                        <div class="col-8">
                            <p class="mb-0 text-muted">{{$game->producer}}</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <h5 class="me-2 mb-0">Prezzo:</h5>
                        <p class="mb-0">${{$game->price}}</p>
                    </div>
                </div>
            </div>
            <div class="text-center pt-5 d-flex justify-content-around">
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
            </div>
        </div>
    </div>
    <x-footer/>
</x-layout>

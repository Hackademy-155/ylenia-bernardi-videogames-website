<x-layout>
    <div class="container py-5">
        <div class="row mb-4 text-center">
            <div class="col-12">
                <h2 class="mb-4">
                    {{$game->title}}
                </h2>
            </div>
        </div>
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
        </div>
    </div>
    <x-footer/>
</x-layout>

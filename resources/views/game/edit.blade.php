<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="d-flex align-items-center justify-content-center">
                    <a href="{{route('game.details', $game)}}"><i class="bi bi-arrow-left-circle-fill account me-4 back-icon"></i></a>
                    <h1 class="my-5 d-inline-block">Modifica della console: {{$game->title}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 form-container shadow">
                @if ($errors->any())
                    <div class="alert alert-danger ">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('game.update', $game)}}" method="POST" enctype="multipart/form-data" class="m-4">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Inserisci il titolo del gioco" value="{{$game->title}}">
                    </div>
                    <div class="mb-3">
                        <label for="producer" class="form-label">Produttore</label>
                        <input type="text" name="producer" class="form-control" id="producer" placeholder="Inserisci il produttore" value="{{$game->producer}}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="text" name="price" class="form-control" id="price" placeholder="Inserisci il prezzo" value="{{$game->price}}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea name="description" class="form-control" id="description" rows="5" placeholder="Descrivi il gioco">{{$game->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <div class="mb-3  text-center">
                            <label for="" class="mb-2">Banner Attuale</label>
                            <img src="{{Storage::url($game->cover)}}" class="img-fluid d-block mx-auto">
                        </div>
                        <label for="cover" class="form-label">Copertina</label>
                        <input type="file" name="cover" class="form-control" id="cover" rows="5" placeholder="Inserisci la copertina del gioco">
                    </div>
                    <div class="mb-5">
                        <label class="form-label mb-3">Consoles disponibili per questo gioco</label>
                        <div class="row g-2">
                            @foreach($consoles as $console)
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="form-check d-flex align-items-center "> 
                                        <input class="form-check-input me-2" type="checkbox" id="console-{{$console->id}}" value="{{$console->id}}" name="consoles[]">
                                        <label class="form-check-label" for="console-{{$console->id}}">{{$console->name}}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-warning">Applica Modifiche</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-footer/>
</x-layout>    
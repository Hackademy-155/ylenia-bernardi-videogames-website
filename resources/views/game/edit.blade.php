<x-layout>
    <div class="container py-5">
        <div class="row mb-4 text-center">
            <div class="col-12">
                <h2 class="mb-1">
                    Modifica del gioco: {{$game->title}}
                </h2>
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
                    <div class="text-center">
                        <button type="submit" class="btn btn-warning">Applica Modifiche</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-footer/>
</x-layout>    
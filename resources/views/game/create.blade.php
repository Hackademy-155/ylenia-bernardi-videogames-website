<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 text-center">Inserisci un gioco!</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 form-container shadow">
                @if ($errors->any())
                <div class="alert alert-danger alert alert-danger d-inline-block text-center">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{route('game.store')}}" method="POST" enctype="multipart/form-data" class="m-4">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Inserisci il titolo del gioco" value="{{old('title')}}">
                    </div>
                    <div class="mb-3">
                        <label for="producer" class="form-label">Produttore</label>
                        <input type="text" name="producer" class="form-control" id="producer" placeholder="Inserisci il produttore" value="{{old('producer')}}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="text" name="price" class="form-control" id="price" placeholder="Inserisci il prezzo" value="{{old('price')}}">
                    </div>
                    <div class="mb-3">
                        <label for="released" class="form-label">Data di uscita</label>
                        <input type="date" name="released" class="form-control" id="released" placeholder="Inserisci la data di uscita" value="{{old('released')}}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea name="description" class="form-control" id="description" rows="5" placeholder="Descrivi il gioco">{{old('description')}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="cover" class="form-label">Copertina</label>
                        <input type="file" name="cover" class="form-control" id="cover" rows="5" placehol der="Inserisci la copertina del gioco">
                    </div>
                    <div class="mb-5">
                        <label class="form-label mb-3">Consoles disponibili per questo gioco</label>
                        <div class="row">
                            @foreach($consoles as $console)
                                <div class="col-12">
                                    <div class="form-check d-flex align-items-center"> 
                                        <input class="form-check-input me-2" type="checkbox" id="console-{{$console->id}}" value="{{$console->id}}" name="consoles[]">
                                        <label class="form-check-label" for="console-{{$console->id}}">{{$console->name}}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Invia dati</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>

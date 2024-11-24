<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 text-center">Inserisci una console!</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-8 form-container shadow">
                @if ($errors->any())
                <div class="alert alert-danger d-inline-block text-center">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{route('console.store')}}" method="POST" enctype="multipart/form-data" class="m-4">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome Console</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Inserisci il nome della console" value="{{old('name')}}">
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Brand</label>
                        <input type="text" name="brand" class="form-control" id="brand" placeholder="Inserisci il brand" value="{{old('brand')}}">
                    </div>
                    <div class="mb-3">
                        <label for="released" class="form-label">Data di uscita</label>
                        <input type="date" name="released" class="form-control" id="released" placeholder="Inserisci la data di uscita" value="{{old('released')}}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="text" name="price" class="form-control" id="price" placeholder="Inserisci il prezzo" value="{{old('price')}}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea name="description" class="form-control" id="description" rows="5" placeholder="Descrivi il gioco">{{old('description')}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto console</label>
                        <input type="file" name="photo" class="form-control" id="photo" rows="5">
                    </div>
                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo console</label>
                        <input type="file" name="logo" class="form-control" id="logo" rows="5">
                    </div>
                    <div class="mb-5">
                        <label class="form-label">Giochi disponibili per questa console</label>
                        <div class="row">
                            @foreach($games as $game)
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="{{$game->id}}" value="{{$game->id}}" name="games[]">
                                        <label class="form-check-label" for="{{$game->id}}">{{$game->title}}</label>
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
    <x-footer/>
</x-layout>

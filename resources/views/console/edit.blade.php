<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="d-flex align-items-center justify-content-center">
                    <a href="{{route('console.show', $console)}}"><i class="bi bi-arrow-left-circle-fill account me-4 back-icon"></i></a>
                    <h1 class="my-5 d-inline-block">Modifica della console: {{$console->name}}</h1>
                </div>
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
                <form action="{{route('console.update', $console)}}" method="POST" enctype="multipart/form-data" class="m-4">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome Console</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Inserisci il nome della console" value="{{$console->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Brand</label>
                        <input type="text" name="brand" class="form-control" id="brand" placeholder="Inserisci il brand" value="{{$console->brand}}">
                    </div>
                    <div class="mb-3">
                        <label for="released" class="form-label">Data di uscita</label>
                        <input type="date" name="released" class="form-control" id="released" placeholder="Inserisci la data di uscita" value="{{ old('released', \Carbon\Carbon::parse($console->released)->format('Y-m-d')) }}"> <!-- funzione che permette di visualizzare la data vecchia durate la modifica del gioco -->
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input type="text" name="price" class="form-control" id="price" placeholder="Inserisci il prezzo" value="{{$console->price}}">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea name="description" class="form-control" id="description" rows="5" placeholder="Descrivi il gioco">{{$console->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <div class="text-center mb-3">
                            <label for="" class="mb-2">Foto Console Attuale</label>
                            <img src="{{Storage::url($console->photo)}}" class="img-fluid d-block mx-auto">
                        </div>
                        <label for="cover" class="form-label">Foto Console</label>
                        <input type="file" name="cover" class="form-control" id="cover">
                    </div>
                    <div class="mb-3">
                        <div class="text-center mb-3">
                            <label for="" class="mb-2">Logo Attuale</label>
                            <img src="{{Storage::url($console->logo)}}" class="img-fluid d-block mx-auto">
                        </div>
                        <label for="logo" class="form-label">Logo Console</label>
                        <input type="file" name="logo" class="form-control" id="logo">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-warning">Applica Modifiche</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>



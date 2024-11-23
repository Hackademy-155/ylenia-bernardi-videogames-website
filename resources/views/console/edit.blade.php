<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 text-center"> Modifica della console: {{$console->name}}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 form-container shadow">
                @if ($errors->any())
                <div class="alert alert-danger alert alert-danger d-inline-block text-center">
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
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea name="description" class="form-control" id="description" rows="5" placeholder="Descrivi il gioco">{{$console->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <div class="mb-3  text-center">
                            <label for="" class="mb-2">Foto Console Attuale</label>
                            <img src="{{Storage::url($console->photo)}}" class="img-fluid d-block mx-auto">
                        </div>
                        <label for="cover" class="form-label">Foto Console</label>
                        <input type="file" name="cover" class="form-control" id="cover" rows="5">
                    </div>
                    <div class="mb-3">
                        <div class="mb-3  text-center">
                            <label for="" class="mb-2">Logo Attuale</label>
                            <img src="{{Storage::url($console->logo)}}" class="img-fluid d-block mx-auto">
                        </div>
                        <label for="cover" class="form-label">Logo Console</label>
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

<div>
    @if (session('success'))
    <div class="alert alert-success text-center mb-4">
        {{ session('success') }}
    </div>
    @endif
    <form wire:submit="update" enctype="multipart/form-data" class="m-4">
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" wire:model="name" class="form-control" id="name" placeholder="Inserisci il nome dell'articolo">
            @error('name')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" wire:model="brand" class="form-control" id="brand" placeholder="Inserisci il brand">
            @error('brand')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="text" wire:model="price" class="form-control" id="price" placeholder="Inserisci il prezzo">
            @error('price')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea wire:model="description" class="form-control" id="description" rows="5" placeholder="Descrivi l'articolo"></textarea>
            @error('description')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <div class="mb-3  text-center">
                <label for="" class="mb-2">Immagine Attuale</label>
                <img src="{{Storage::url($accessory->photo)}}" class="img-fluid d-block mx-auto">
            </div>
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Nuova Foto</label>
            <input type="file" wire:model="photo" class="form-control" id="photo" rows="5">
            @error('photo')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-warning">Applica Modifiche</button>
        </div>
    </form>
</div>

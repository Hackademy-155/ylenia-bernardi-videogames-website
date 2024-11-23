<x-layout>
    <div class="container">
        <div class="row text-center mt-5 mb-0">
            <div class="col-12">
                <h1>Tutte le Console</h1>
                <p style="color: rgba(0, 0, 0, 0.35);">
                    Clicca su una console per scopri di più...
                </p>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            @if (count($consoles) > 0)
                @foreach ($consoles as $console)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 my-5 d-flex justify-content-center">
                        <div class="console-card">
                            <img class="console-card-img" style="background-image: url({{ Storage::url($console->photo) }});">
                            <div class="console-card-info">
                                <p class="console-text-title">{{$console->name}}</p>
                                <p class="console-text-body">{{$console->brand}}</p>
                            </div>
                            <button class="console-card-button">Scopri di più</button> 
                        </div>
                    </div>                    
                @endforeach
            @else
                <div class="col-12 text-center text-secondary">
                    <i class="bi bi-emoji-grimace fs-1"></i>
                    <h4>Non è presente alcuna console.</h4>
                </div>
            @endif
        </div>
    </div>

    <x-footer/>
</x-layout>

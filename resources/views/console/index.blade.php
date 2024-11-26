<x-layout>
    <x-header>
        <h1 class="text-white">Tutte le Console</h1>
    </x-header>
    <div class="container">
        <div class="row text-center mt-5 mb-0">
            <div class="col-12">
                <p style="color: rgba(0, 0, 0, 0.35);">
                    Clicca su una console per scoprire di più...
                </p>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            @if (count($consoles) > 0)
                @foreach ($consoles as $console)
                    <div class="col-12 col-sm-6 col-md-5 col-lg-4 my-5 d-flex justify-content-center">
                        <div class="console-card console-card-container">
                            <img class="console-card-img" src="{{ Storage::url($console->photo) }}">
                            <div class="console-card-info">
                                <p class="console-text-title">{{$console->name}}</p>
                                <p class="console-text-body">{{$console->brand}}</p>
                            </div>
                            <a href="{{route('console.show', $console)}}">
                                <button class="console-card-button">Scopri di più</button> 
                            </a>
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

<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5 mb-0">
                <h1 class="">Tutte le Console</h1>
                <p style="color: rgba(0, 0, 0, 0.35);">
                    Clicca su una console per scopre di più...
                </p>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            @if (count($consoles)>0)
                @foreach ($consoles as $console)
                <div class="col-12 col-md 3 my-5">
                    
                </div>
                @endforeach
            @endif
        </div>
    </div>
    <x-footer/>
</x-layout>
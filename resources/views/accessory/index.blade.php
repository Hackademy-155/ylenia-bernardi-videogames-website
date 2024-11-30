<x-layout>
    <x-header>
        <h1 class="text-white">Tutti gli Accessori</h1>
    </x-header>
    <div class="container">
        <div class="row text-center mt-5 mb-0">
            <div class="col-12">
                @if (count($accessories) > 0)
                    <p style="color: rgba(0, 0, 0, 0.35);">
                        Clicca su un articolo per scoprire di più...
                    </p>
                @endif
            </div>
        </div>
    </div>
    @if (session('success'))
    <div class="alert alert-success text-center mb-4">
        {{ session('success') }}
    </div>
    @endif
    <div class="container mt-5">
        <div class="row justify-content-center">
            @if (count($accessories) > 0)
                @foreach ($accessories as $accessory)
                <div class="accessory">
                    <a href="{{route('accessory.show', $accessory->id)}}"><img class="accessory-img" src="{{ Storage::url($accessory->photo) }}"></a>
                </div>                    
                @endforeach
            @else
                <div class="col-12 text-center text-secondary mb-">
                    <i class="bi bi-emoji-grimace fs-1"></i>
                    <h4>Non è presente alcun articolo.</h4>
                </div>
            @endif
        </div>
    </div>
</x-layout>

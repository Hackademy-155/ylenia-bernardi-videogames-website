<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5 mb-0">
                <h1 class="">Tutti i Giochi</h1>
                <p style="color: rgba(0, 0, 0, 0.35);">
                    Clicca su un gioco per scopre di più...
                </p>
            </div>
        </div>
    </div>
    @if (count($games) < 0)
        <div class="col-12 text-center text-secondary">
            <i class="bi bi-emoji-grimace fs-1"></i>
            <h4>Non è presente alcun gioco.</h4>
        </div>
    @endif
    @if (session('message'))
        <div class="d-flex justify-content-center mt-3">
            <div class="alert alert-success text-center">
                {{ session('message') }}
            </div>
        </div>
    @endif
    <div class="container mt-5">
        <div class="row">
            @foreach($games as $game)
            <div class="col-12 col-md 3 my-5">
                <x-card :game="$game"/>
            </div>
            @endforeach
        </div>
    </div>
    <x-footer/>
</x-layout>
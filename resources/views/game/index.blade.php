<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 text-center">Tutti i Giochi</h1>
            </div>
        </div>
    </div>
    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
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
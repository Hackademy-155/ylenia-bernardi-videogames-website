<x-layout>
    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
        <x-header>
            <h1>Scopri il Mondo dei Videogiochi</h1>
            <h2>Lorem ipsum dolor, sit amet consectetur adipisicing.</h2>
        </x-header>
</x-layout>
<x-layout>
    @if (session('message'))
        <div class="d-flex justify-content-center mt-3">
            <div class="alert alert-success text-center">
                {{ session('message') }}
            </div>
        </div>
    @endif
    <x-header>
        <h1>Scopri il Mondo dei Videogiochi</h1>
        <h2>Lorem ipsum dolor, sit amet consectetur adipisicing.</h2>
    </x-header>
    <x-footer/>
</x-layout>
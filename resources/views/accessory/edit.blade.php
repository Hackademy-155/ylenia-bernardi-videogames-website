<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 text-center">Modifica dell'artciolo: {{$accessory->name}}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 col-lg-4 form-container shadow">
                <livewire:edit-article :accessory="$accessory"/>
            </div>
        </div>
    </div>
</x-layout>
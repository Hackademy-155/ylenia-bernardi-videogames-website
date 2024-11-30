<header class="container-fluid 
    {{ Route::currentRouteName() == 'game.index' ? 'backgroundGames' : 
    (Route::currentRouteName() == 'console.index' ? 'backgroundConsoles' : 
    (Route::currentRouteName() == 'accessory.index' ? 'backgroundAccessory' : '')) }}">
    <div class="row vh-100 text-center text-black align-items-center">
        <div class="col-12">
            {{$slot}}
            <p class="text-secondary">
                Scorri per vedere il resto...
            </p>
        </div>
    </div>
</header>

<div class="page-container">
    <a href="{{route('game.details', $game)}}">
        <div class="card">
            <div class="card-inner" style="background-image: url({{Storage::url($game->cover)}}); background-size: cover; background-position: center;">
                <div class="card-content">
                    <p class="card-title">{{ $game->title }}</p>
                </div>
            </div>
        </div>
    </a>
</div>

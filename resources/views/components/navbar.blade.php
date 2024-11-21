<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <i class="bi bi-controller pe-2 ps-2 logo"></i>
        <a class="navbar-brand" href="{{route('homepage')}}">GameGlitch</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto"> 
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('game.index')}}">Games</a>
                </li>
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('game.create')}}">Insert Game</a>
                </li>
                @endauth
            </ul>
            <ul class="navbar-nav d-flex align-items-center"> 
                @auth
                    <li class="nav-item">
                        <span class="nav-link">Ciao, {{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard')}}"><i class="bi bi-person account"></i></a>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <span class="nav-link">Accedi o Registrati</span>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{route('login')}}"><i class="bi bi-person-circle account"></i></a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item me-2">
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();"><i class="bi bi-box-arrow-right account"></i></a>
                    </li>
                @endauth
                <li class="nav-item">
                    <label class="switch">
                        <input type="checkbox" />
                        <span class="slider"></span>
                    </label>
                </li>
            </ul>
            <form action="{{route('logout')}}" method="POST" id="form-logout" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</nav>

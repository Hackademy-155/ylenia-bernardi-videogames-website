<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 text-center">Accedi</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 form-container shadow">
                <form action="{{route('login')}}" method="POST" class="m-4">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Inserisci la tua email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control rounded-start rounded-end" id="password" placeholder="Inserisci la password">
                            <button type="button" class="btn fs-5 ps-4 rounded-end" id="togglePassword" style="border: none;">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                    </div>                    
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary">Accedi</button>
                    </div>
                    <div class="text-center fs-6">
                        <a href="{{route('register')}}">Non hai un account? Registrati</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-footer/>
</x-layout>
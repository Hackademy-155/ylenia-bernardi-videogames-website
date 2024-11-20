<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-5 text-center">Registrati</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 form-container shadow">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('register')}}" method="POST" class="m-4">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="name" name="name" class="form-control" id="name" placeholder="Inserisci il tuo nome">
                    </div>
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
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Conferma Password</label>
                        <div class="input-group">
                            <input type="password" name="password_confirmation" class="form-control rounded-start rounded-end" id="password_confirmation" placeholder="Conferma password">
                            <button type="button" class="btn fs-5 ps-4 rounded-end" id="togglePassword" style="border: none;">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>               
                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-primary">Registrati</button>
                    </div>
                    <div class="text-center fs-6">
                        <a href="{{route('login')}}">Hai già un account? Accedi</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-footer/>
</x-layout>
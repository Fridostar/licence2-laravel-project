@extends('layouts.auth')
@section('content')

<section>
    <div class="container col-6">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center my-3">CONNEXION</h5>

                <div class="d-flex justify-content-center">
                    <form method="POST" action="{{ route('auth.doLogin') }}" class="row g-3">
                        @csrf
                        <!-- email field -->
                        <div class="col-12 mb-2">
                            <label for="email" class="form-label">Adresse mail :</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Veuillez entrer votre mail...">
                        </div>

                        <!-- password field -->
                        <div class="col-12 mb-2">
                            <label for="password" class="form-label">Mot de passe :</label>
                            <input name="password"type="password" class="form-control" id="password" placeholder="Veuillez entrer votre mot de passe...">
                        </div>

                        <!-- other field -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input type="checkbox" id="staty-connect">
                                    <label for="staty-connect">
                                        Rester connecter
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p class="text-end"><a href="{{ route('auth.forgot-password') }}">Mot de passe oublié</a></p>
                            </div>
                        </div>

                        <!-- submit boutton -->
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-2" type="submit">Se connecter</button>
                        </div>

                        <span class="text-end">Pas inscrire? <a href="{{ route('auth.register') }}">Inscrivez-vous</a></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
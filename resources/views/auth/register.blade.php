@extends('layouts.auth')
@section('content')
<section>
    <div class="container col-6">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center my-3">INSCRIPTION</h5>

                <div class="d-flex justify-content-center">
                    <form method="POST" action="{{ route('auth.doRegister') }}">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="mb-3">
                                        <label for="firstName" class="form-label">Prénom :</label>
                                        <input name="firstName" type="text" class="form-control" id="firstName" placeholder="Entrez votre prénom">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="mb-3">
                                        <label for="lastName" class="form-label">Nom :</label>
                                        <input name="lastName" type="text" class="form-control" id="lastName" placeholder="Entrez votre nom">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Adresse mail :</label>
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Votre adresse mail">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="mb-3">
                                        <label for="phoneNumber" class="form-label">Télephone :</label>
                                        <input name="phoneNumber" type="text" class="form-control" id="phoneNumber" placeholder="Numéro de téléphone">
                                    </div>
                                </div> 
                                <div class="col-lg-6 mb-3">
                                    <div class="mb-3">
                                        <label for="birthDate" class="form-label">Date de naissance :</label>
                                        <input name="birthDate" type="date" class="form-control" id="birthDate" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Mot de passe :</label>
                                        <input name="password" type="password" class="form-control" id="password" placeholder="Votre mot de passe">
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class="mb-3">
                                        <label for="passwordConfirmation" class="form-label">Confirmation :</label>
                                        <input name="passwordConfirmation" type="password" class="form-control" id="passwordConfirmation" placeholder="Confirmerz le mot de passe">
                                    </div>
                                </div>

                                <!-- submit boutton -->
                                <div class="col-12 mb-3">
                                    <button class="btn btn-primary w-100 py-2" type="submit">Se connecter</button>
                                </div>

                                <span class="text-end">Déjà un compte ? <a href="{{ route('auth.login') }}">Me connecter</a></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
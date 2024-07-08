@extends('layouts.dash')

@section('title', 'Accueil')
@section('headerTitle', 'ACCEUIL')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="card border border-dark">
                <div class="card-body px-4 pb-0 d-flex justify-content-between form-control border-light">
                    <div>
                        <h4 class=" font-w600 text-nowrap">Total abonnés</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="">{{ $subscribersCount }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 text-end"><i class="fas fa-user-check"></i></div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card border border-dark">
                <div class="card-body px-4 pb-0 d-flex justify-content-between">
                    <div>
                        <h4 class=" font-w600 text-nowrap">Total abonnements</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <h2 class="">{{ $subscriptionsCount }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 text-end"><i class="fas fa-user-check"></i></div>
                </div>
            </div>

        </div>

        <div class="col-lg-3">
            <div class="card border border-dark">
                <div class="card-body px-4 pb-0 d-flex justify-content-between form-control border-light">
                    <div>
                        <h4 class=" font-w600 text-nowrap">Total acheteurs</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="">{{$purchasersCount}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 text-end"><i class="fas fa-user-check"></i></div>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card border border-dark">
                <div class="card-body px-4 pb-0 d-flex justify-content-between form-control border-light">
                    <div>
                        <h4 class=" font-w600 text-nowrap">Total achats</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="">{{$purchasesCount}}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 text-end"><i class="fas fa-user-check"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
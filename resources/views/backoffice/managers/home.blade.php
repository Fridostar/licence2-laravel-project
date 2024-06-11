@extends('layouts.dash')

@section('title', 'Accueil')
@section('headerTitle', "ACCEUIL")

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4 ">
                                    <div class="card border border-dark">
                                        <div class="card-body px-4 pb-0 d-flex justify-content-between form-control border-light">
                                            <div>
                                                <h4 class=" font-w600  text-nowrap">Total abonnés</h4>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h2 class="">{{$subscribersList}}</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 text-end"><i class="fas fa-user-check"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-4 ">
                                    <div class="card border border-dark">
                                        <div class="card-body px-4 pb-0  form-control border-light">
                                            <div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <h4 class="">Total coatch</h4>
                                                    </div>
                                                    <div class="col-lg-6 text-end"><i class="fas fa-user-check"></i></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <h2 class="">68</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" "></div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-lg-4 ">
                                    <div class="card border border-dark">
                                        <div class="card-body px-4 pb-0 d-flex justify-content-between">
                                            <div>
                                                <h4 class=" font-w600  text-nowrap">Total abonnements</h4>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <h2 class="">{{$subscriptionsList}}</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 text-end"><i class="fas fa-user-check"></i></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>


    </div>
</div>
</div>
</div>
@endsection
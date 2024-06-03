@extends('layouts.dash')

@section('title', 'Mon compte')

@section('content')
<div class="row ">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">

                        <div class="table">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">N°</th>
                                            <th class="text-center">Type d'abonnement</th>
                                            <th class="text-center">Date d'abonnement</th>
                                            <th class="text-center">Période d'abonnement</th>
                                            <th class="text-center">Expiration</th>
                                            <th class="text-center">Jours restant</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="text-center">1</th>
                                            <td class="text-center">Mensuel</td>
                                            <td class="text-center"> 04/04/2024</td>
                                            <td class="text-center">04/04/2024-04/04/2024 </td>
                                            <td class="text-center">04/04/2024</td>
                                            <td class="text-center">0M 4J 5MN 3S</td>
                                        </tr>
                                        <tr>
                                            <th class="text-center">2</th>
                                            <td class="text-center">Mensuel</td>
                                            <td class="text-center"> 04/04/2024</td>
                                            <td class="text-center">04/04/2024-04/04/2024 </td>
                                            <td class="text-center">04/04/2024</td>
                                            <td class="text-center">0M 4J 5MN 3S</td>
                                        </tr>
                                        <tr>
                                            <th class="text-center">3</th>
                                            <td class="text-center">Mensuel</td>
                                            <td class="text-center"> 04/04/2024</td>
                                            <td class="text-center">04/04/2024-04/04/2024 </td>
                                            <td class="text-center">04/04/2024</td>
                                            <td class="text-center">0M 4J 5MN 3S</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@extends('layouts.dash')

@section('title', "Outfit Details")
@section('headerTitle', "DETAILS DE L'Equipement")

@section('content')
<div class="container-fluid">
    <div class="card col-6">
        <div class="card-body">
            <div class="">
            <h4><span class="mb-3"><strong>Titre de l'équipement :</strong> {{ $outfit->name }}</span></h4>
            <h4><span class="mb-3"><strong>Description de l'équipement :</strong> {{ $outfit->description }}</span></h4>
            <h4><span class="mb-3"><strong>Prix de vente de l'équipement :</strong> {{ $outfit->sale_price }} {{ $outfit->currency }}</span></h4>
            <h4><span class="mb-3"><strong>Créer le :</strong> {{ $outfit->created_at->format('d-m-Y à h:i') }}</span></h4> <!-- diffForHumans() | format('l jS \\of F Y h:i:s A') -->
            </div>
        </div>
    </div>
</div>
@endsection
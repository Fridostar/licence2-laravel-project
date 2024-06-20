@extends('layouts.dash')

@section('title', "Outfit Details")
@section('headerTitle', "DETAILS DE LA SALLE")

@section('content')
<div class="container-fluid">
    <div class="card col-6">
        <div class="card-body">
            <div class="">
            <h4><span class="mb-3"><strong>Nom de la salle :</strong> {{ $room->name }}</span></h4>
            <h4><span class="mb-3"><strong>Description de la salle :</strong> {{ $room->description }}</span></h4>
            <h4><span class="mb-3"><strong>URL de l'image de la salle :</strong> {{ $room->cover_image }}</span></h4>  <!-- diffForHumans() | format('l jS \\of F Y h:i:s A') -->
            <h4><span class="mb-3"><strong>Url de l'image de couverture :</strong> {{ $room->overview_image }}</span></h4>
            <h4><span class="mb-3"><strong>Créer le :</strong> {{ $room->created_at->format('d-m-Y à h:i') }}</span></h4>
            </div>
        </div>
    </div>
</div>
@endsection


@extends('layouts.dash')

@section('title', 'Gestion des salles')
@section('headerTitle',
    $room->exists
    ? 'LES SALLES | Modification de la salle N°' . $room->id
    : "LES SALLES | Ajout
    d'une nouvelle salle")

@section('content')
    <div class="container-fluid">

        <div class="card">
            <form method="POST" action="{{ route($room->exists ? 'manager.room.update' : 'manager.room.store', $room->id) }}"
                enctype="multipart/form-data" class="vstack gap-3">
                @csrf
                @method($room->exists ? 'PUT' : 'POST')

                <div class="card-body">
                    <div class="col-lg-12 mb-3">
                        @include('shared.form.input', [
                            'label' => 'Nom de salle',
                            'name' => 'name',
                            'type' => 'text',
                            'value' => $room->name,
                            'placeholder' => 'Entrer le nom de la salle',
                        ])
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            @include('shared.form.input', [
                                'label' => "L'url du site",
                                'name' => 'site_url',
                                'type' => 'text',
                                'value' => $room->site_url,
                                'placeholder' => "Entrer l'url du site de votre salle",
                            ])
                        </div>
                        <div class="col-lg-6 mb-3">
                            @include('shared.form.selectmultiple', [
                                'label' => 'Abonnement disponible pour la salle',
                                'name' => 'pricings',
                                'value' => $room->pricings()->pluck('id'),
                                'selectMultipleOptions' => $pricings,
                            ])
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-9 mb-3">
                            @include('shared.form.selectmultiple', [
                                'label' => 'Equipements',
                                'name' => 'outfits',
                                'value' => $room->outfits()->pluck('id'),
                                'selectMultipleOptions' => $outfits,
                            ])
                        </div>
                        <div class="col-lg-3 mb-3 form-check form-switch dflex justify-end">
                            <p></p><br>
                            @include('shared.form.checkswitch', [
                                'label' => 'Disponible?',
                                'name' => 'status',
                                'value' => $room->status,
                            ])
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            @include('shared.form.fileimage', [
                                'label' => 'Image de couverture de la salle',
                                'name' => 'cover_image',
                                'value' => $room->cover_image,
                            ])
                        </div>
                        <div class="col-lg-6 mb-3">
                            @include('shared.form.fileimage', [
                                'label' => 'Image de couverture',
                                'name' => 'overview_image',
                                'value' => $room->overview_image,
                            ])
                        </div>
                    </div>

                    {{-- seconde ligne --}}
                    <div class="col-lg-12 mb-3">
                        @include('shared.form.textarea', [
                            'label' => 'Description',
                            'name' => 'description',
                            'value' => $room->description,
                            'placeholder' => 'Entrer une description de votre salle',
                        ])
                    </div>
                </div>

                <div class="card-footer bg-light">
                    <div class="d-flex justify-content-center">

                        <a href="{{ route('manager.room.index') }}" type="button" class="btn btn-danger light me-2">
                            <i class="fas fa-times-circle"></i>
                            @if ($room->exists)
                                Annuller les modifications
                            @else
                                Annuller l'ajout
                            @endif
                        </a>

                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check-circle"></i>
                            @if ($room->exists)
                                Enrégister les modifications
                            @else
                                Ajouter une salle
                            @endif
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

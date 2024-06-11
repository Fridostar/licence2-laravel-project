@extends('layouts.dash')

@section('title', "Tarifs")
@section('headerTitle', "TYPE D'ABONNEMENTS")

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ">
                        <div class="col-lg-9">
                            <div class="input-group">
                                <input type="text" class="form-control border-light" placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2">Rechercher</button>
                            </div>
                        </div>
                        <div class="col-lg-3 text-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalbasicc">
                                Ajouter un tarif
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">

                                @if($pricingList)
                                <div class="table">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-responsive-sm">
                                            <thead>
                                                <tr>
                                                    <th class="text-start">N°</th>
                                                    <th class="text-start">Titre </th>
                                                    <th class="text-start">Durée </th>
                                                    <th class="text-start">Prix</th>
                                                    <th class="text-start">Devise</th>
                                                    <th class="text-end">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($pricingList as $pricing)
                                                <tr>
                                                    <td class="text-start">{{ $loop->index +1 }}</td>
                                                    <td class="text-start">{{$pricing->name}}</td>
                                                    <td class="text-start">{{$pricing->duration}}</td>
                                                    <td class="text-start">{{$pricing->price}}</td>
                                                    <td class="text-start">{{$pricing->currency}}</td>
                                                    <td class="text-end">
                                                        <div class="btn-toolbar justify-content-end">
                                                            <div class=" btn-group btn-group-sm">
                                                                <a href="{{ route('manager.pricing.update', $pricing->id) }}" id="edit" data-bs-toggle="modal" data-bs-target="#modalbasicc" data-id="{{ $pricing->id }}" class="btn btn-sm btn-outline-info"><i class="far fa-edit"></i></a>
                                                                <a href="{{ route('manager.pricing.destroy', $pricing->id) }}" id="delete" data-toggle="modal" data-target="#modal-three" data-id="{{ $pricing->id }}" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></a>


                                                                <!-- <a href="{{ route('manager.pricing.show', $pricing->id) }}" type="button" class="btn btn-outline-info"><i class="fas fa-eye"></i></a>
                                                                <button type="button" class="btn btn-outline-success mx-1" data-bs-toggle="modal" data-bs-target="#modalbasicc"><i class="fas fa-edit"></i></button>
                                                                <a href="{{ route('manager.pricing.destroy', $pricing->id) }}" type="button" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a> -->
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @else
                                <div class="d-flex justify-content-center">
                                    <img src="{{ asset('front-tools/empty_collection.jpeg') }}" alt="empty_collection" class="">
                                </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="modalbasicc" tabindex="-1" aria-labelledby="exapleModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('manager.pricing.update', $pricing->id) }}" class="row g-3">
        @csrf
        <div class="modal-dialog modal-default">
            <div class="modal-content">
                <div class="modal-header">
                    @if($isCreateModal)
                    <h5 class="modal-title">Ajouter un type d'abonnement</h5>
                    @else
                    <h5 class="modal-title">Modifier le type d'abonnement</h5>
                    @endif

                    <button class="btn-close" data-bs-dismiss="modal" aria-label="close"><span aria-hidden="true"></span></button>
                </div>

                <div class="modal-body ">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <div class="mb-3">
                                <label for="name" class="form-label">Titre abonnement :</label>
                                <input name="name" value="{{$pricing->name}}" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Le titre de l'abonnement" required>
                            </div>
                            <span class="text-danger">
                                @error('name')
                                <small class="text-tiny">{{$message}}</small>
                                @enderror
                            </span>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <div class="mb-3">
                                <label for="duration" class="form-label">Périod (jours) :</label>
                                <input name="duration" value="{{old('duration')}}" type="number" class="form-control @error('duration') is-invalid @enderror" id="duration" placeholder="La durée de l'abonnement" required>
                            </div>
                            <span class="text-danger">
                                @error('duration')
                                <small class="text-tiny">{{$message}}</small>
                                @enderror
                            </span>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <div class="mb-3">
                                <label for="price" class="form-label">Prix :</label>
                                <input name="price" value="{{old('price')}}" type="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Le prix de l'abonnement" required>
                            </div>
                            <span class="text-danger">
                                @error('price')
                                <small class="text-tiny">{{$message}}</small>
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-center">
                    @if($isCreateModal)
                    <button class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#modalcenter">Créer</button>
                    @else
                    <button class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#modalcenter">Modifier</button>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
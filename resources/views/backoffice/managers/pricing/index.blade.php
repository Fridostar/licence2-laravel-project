@extends('layouts.dash')

@section('title', "Tarifs")
@section('headerTitle', "TYPE D'ABONNEMENTS")

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header ">
            <div class="col-lg-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                    Ajouter un tarif
                </button>
            </div>
            <div class="col-lg-9">
                <div class="input-group">
                    <input type="text" class="form-control border-light" placeholder="" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Rechercher</button>
                </div>
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
                                                    <!-- show item details -->
                                                    <a href="{{ route('manager.pricing.show', $pricing->id) }}" type="button" class="btn btn-outline-info">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <!-- edit item details -->
                                                    <a href="{{ route('manager.pricing.update', $pricing->id) }}" type="button" class="btn btn-outline-success mx-1" data-bs-toggle="modal" data-bs-target="#updateModal{{ $pricing->id }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <!-- delete item from database -->
                                                    <a href="{{ route('manager.pricing.destroy', $pricing->id) }}" type="button" class="btn btn-outline-danger" data-confirm-delete="true">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- edit modal -->
                                    @include('backoffice.managers.pricing.modals.editmodal')

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


<!-- create modal -->
@include('backoffice.managers.pricing.modals.createmodal')

@endsection
@extends('layouts.dash')

@section('title', "Equipements")
@section('headerTitle', "EQUIPEMENTS")

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
                    @if($outfitList)
                    <div class="table">
                        <div class="table-responsive">
                            <table class="table table-striped table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th class="text-start">#</th>
                                        <th class="text-start">Nom</th>
                                        <th class="text-start">Description </th>
                                        <th class="text-start">Prix</th>
                                        <th class="text-start">Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($outfitList as $outfit)
                                    <tr>
                                        <td class="text-start">{{ $loop->index +1 }}</td>
                                        <td class="text-start col-md-3">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <img src="{{$outfit->cover_image}}" height="50" width="50" alt="">
                                                </div>
                                                <div class="col-md-9">
                                                    {{ Str::limit($outfit->name, 80) }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-start col-md-4">{{ Str::limit($outfit->description, 150) }}</td>
                                        <td class="text-start">{{ number_format($outfit->sale_price, thousands_separator: ".") }} {{$outfit->currency}}</td>
                                        <td class="text-start">
                                            @if($outfit->status == 0)
                                            <span class="badge rounded-pill bg-danger">Indisponible</span>
                                            @else
                                            <span class="badge rounded-pill bg-success">Disponible</span>
                                            @endif

                                        </td>
                                        <td class="text-end">
                                            <div class="btn-toolbar justify-content-end">
                                                <div class=" btn-group btn-group-sm">
                                                    <!-- show item details -->
                                                    <a href="{{ route('manager.outfit.show', $outfit->id) }}" type="button" class="btn btn-outline-info">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <!-- edit item details -->
                                                    <a href="{{ route('manager.outfit.update', $outfit->id) }}" type="button" class="btn btn-outline-success mx-1" data-bs-toggle="modal" data-bs-target="#updateModal">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <!-- delete item from database -->
                                                    <a href="{{ route('manager.outfit.destroy', $outfit->id) }}" type="button" class="btn btn-outline-danger" data-confirm-delete="true">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- edit modal -->
                                    @include('backoffice.managers.outfit.modals.editmodal')

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- pagination -->
                    {{ $outfitList->withQueryString()->links() }}

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
@include('backoffice.managers.outfit.modals.createmodal')

@endsection
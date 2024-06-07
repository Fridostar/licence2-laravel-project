@extends('layouts.guest')
@section('content')

<!-- @dump($listOutfits) -->

<!-- Portfolio Single -->
<section>
    <div class="container">
        <!-- overview -->
        <div class="mb-5">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="pq-service-img">
                            <img class="" src="{{ $room->overview_image }}" height="150px">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <h2 class="mb-3">{{ $room->name }}</h2>
                        <p>{{ $room->description }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- offerts -->
        <h2 class="text-center">EQUIPEMENT DISPONIBLE</h2>

        <div class="my-5">
            <div class="row">
                @foreach($listOutfits as $outfit)
                <div class="col-lg-4 mb-3">
                    <div class="card">
                        <div class="pq-service-img">
                            <img class="" src="{{ $outfit->cover_image }}" height="150px">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">{{ $outfit->name }}</h6>
                            <p class="mb-3">{{ Str::limit($outfit->description, 80) }}</p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>{{ $outfit->sale_price }} {{ $outfit->currency }}</h6>
                                </div>
                                <div class="col-lg-6 text-end">
                                    <h6>
                                        @if($outfit->status == 0)
                                        <span class="badge rounded-pill text-bg-danger">Indisponible</span>
                                        @else
                                        <span class="badge rounded-pill text-bg-info">Disponible</span>
                                        @endif
                                    </h6>
                                </div>
                            </div>
                            
                            <button type="button" class="btn btn-outline-primary mt-3 w-100" data-bs-toggle="modal" data-bs-target="">Acheter</button>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>

        <!-- pagination -->
        {{$listOutfits->links()}}
    </div>
</section>

@endsection
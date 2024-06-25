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
                            <img src="@include('shared.format.imgpath', ['value' => $room->overview_image])" height="150px">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <button>M'enregister à la salle</button>
                        <p style="text-align: justify;"><h2 class="mb-3">{{ $room->name }}</h2></p>
                        <p style="text-align: justify;">{{ $room->description }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- offerts -->
        <h2 class="text-center">EQUIPEMENT DISPONIBLE</h2>

        <div class="d-flex justify-content-center row">
            <div class="text-center">
                <p>Voici la liste des équipements disponible pour cette salle</p>
            </div>
            <div class="col-lg-7 mb-5">
                {{-- <form method="GET" action="{{ route('app.rooms.overview', $room->id) }}" class="d-flex" role="search">
                    <input name="search" class="form-control me-2" type="search" placeholder="Recherchez un équipement..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Rechercher</button>
                </form> --}}

                @include('shared.search', ['action' => "app.rooms.overview", 'actionParam' => $room->id, 'inputClass' => "form-control me-2", 'buttonClass' => "btn btn-outline-success"])
            </div>
        </div>

        <div class="mb-5">
            <div class="row">
                @forelse($listOutfits as $outfit)
                <div class="col-lg-4 mb-3">
                    <div class="card">
                        <div class="pq-service-img">
                            <img src="@include('shared.format.imgpath', ['value' => $outfit->cover_image])" height="150px">
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
                @empty
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('template/empty_collection.jpeg') }}" alt="empty_collection" class="">
                </div>
                @endforelse
            </div>
        </div>

        <!-- pagination -->
        {{ $listOutfits->withQueryString()->links() }}
    </div>
</section>

@endsection
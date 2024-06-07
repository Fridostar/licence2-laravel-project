@extends('layouts.guest')
@section('content')

<!-- @dump($listRooms) -->

<section>
    <div class="container mb-4">
        <div class="d-flex justify-content-center ">
            <div class="text-center mb-5">
                <h1>Bienvenu sur {{env('APP_NAME')}}</h1>
                <p>Notre platforme vous propose nos différents salles de gym, ainsi que leur offres et services.</p>

                <div class="col-lg-12 ">
                    <form class="d-flex " role="search">
                        <input class="form-control me-2" type="search" placeholder="Recherchez une salle..." aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">rechercher</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($listRooms as $room)
            <div class="col-lg-4 mb-5">
                <div class="card card-product">
                    <!-- cover image -->
                    <a href="{{ route('gym.rooms.overview', $room) }}">
                        <div class="pq-service-img">
                            <img class="" src="{{ $room->cover_image }}" alt="service-image">
                        </div>
                    </a>

                    <div class="card-body">
                        <a href="{{ route('gym.rooms.overview', $room) }}">
                            <h5 class="card-title">{{ Str::limit($room->name, 22) }} </h5>
                        </a>

                        <h6>Tel: {{ $room->user->phone_number }}</h6>
                        <h6 class="mb-2">Email: {{ Str::limit($room->user->email, 18) }}</h6>

                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <h6>
                                    @if($room->status == 0)
                                    <span class="badge rounded-pill text-bg-danger">Indisponible</span>
                                    @else
                                    <span class="badge rounded-pill text-bg-info">Disponible</span>
                                    @endif
                                </h6>
                                <a href="{{ $room->site_url }}" target="_blank">
                                    <h6 class="text-primary">Site web</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- pagination -->
    {{$listRooms->links()}}
</section>

@endsection
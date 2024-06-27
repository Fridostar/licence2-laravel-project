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
                        @auth
                        <!-- available subscriptions modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#availableSubsciption">M'enre gister à la salle</button>
                        <div class="modal fade" id="availableSubsciption" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content ">
                                    <div class="modal-body">
                                        <div class="d-flex justify-content-center">
                                            @foreach($room->pricings as $pricing)
                                            <div class="col-lg-3 mx-3">
                                                <button onclick="payement( 
                                                        'subscription',
                                                        '<?php echo ($pricing->id) ?>',
                                                        '<?php echo ($room->id) ?>',
                                                        'null',
                                                        '<?php echo ($authenticatedUser->id) ?>',
                                                        '<?php echo ($pricing->price) ?>', 
                                                        '<?php echo ($authenticatedUser->email) ?>', 
                                                        '<?php echo ($authenticatedUser->last_name) ?>', 
                                                        '<?php echo ($authenticatedUser->first_name) ?>'
                                                    )" class="btn btn-outline-primary">
                                                    Payer {{ $pricing->price }} FCFA
                                                </button>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#loginModal">M'enre gister à la salle</button>
                        @endauth


                        <p style="text-align: justify;">
                        <h2 class="mb-3">{{ $room->name }}</h2>
                        </p>
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


@push('script')
<script type="text/javascript">
    function setCookie(name, value, days) {
        var expires = "";

        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    function payement(
        option, pricingId, roomId, outfitId, userId, transAmount, 
        transUserEmail, transUserLastname, transUserFirstname
    ) {
        let widget = FedaPay.init({
            public_key: 'pk_sandbox_sqZQ7mDXl4gnj_lOM6CXyx-a',
            transaction: {
                amount: transAmount,
                description: 'Acheter mon produit',
                custom_metadata: {
                    "option": option,
                    "pricing_id": pricingId,
                    "room_id": roomId,
                    "outfit_id": outfitId,
                    "user_id": userId,
                },
            },
            customer: {
                email: transUserEmail,
                lastname: transUserLastname,
                firstname: transUserFirstname,
            },
            onComplete(response) {
                if (response.transaction.status === "approved") {
                    setCookie('approuvedTransaction', JSON.stringify(response.transaction), 1)
                    // localStorage.setItem('transaction', JSON.stringify(response.transaction));
                }
            }
        });
        
        widget.open();
    }
</script>
@endpush('script')
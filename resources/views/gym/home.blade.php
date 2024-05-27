@extends('layouts.guest')
@section('content')

<!-- Portfolio Single -->
<section>
    <div class="container">
        <!-- overview -->
        <div class="mb-5">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="pq-service-img">
                            <img class="" src="{{ asset('front-tools/images/service/service-box-1/slider/1.jpg') }}" height="150px">
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <h2>PRESENTATION</h2>
                        <p>Project Summery are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly
                            believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything
                            embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat
                            predefined chunks as necessary, making this the first true generator on the Internet. It uses a
                            dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate
                            Lorem Ipsum which looks reasonable.</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and Lorem Ipsum is simply dummy typesetting industry.
                            Lorem Ipsum is simply dummy Lorem Ipsum has been the industry’s standard dummy text ever since the
                            1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It
                            has survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- offerts -->
        <h2 class="text-center">EQUIPEMENT DISPONIBLE</h2>

        <div class="my-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="pq-service-img">
                            <img class="" src="{{ asset('front-tools/img2/fitness-1990340_1280.png') }}" height="150px">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">Nom de l'equipement</h6>
                            <p class="card-text">
                            <h6>Description</h6>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                                alteration in some form</p>
                            </p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>30000 XOF</h6>
                                </div>
                                <div class="col-lg-6 text-end">
                                    <span class="badge text-bg-danger">
                                        <h6 class="text-white">Disponible</h6>
                                    </span>
                                </div>
                            </div>
                            <div class="row w-100 ">
                                <div class="col-lg-12 ">
                                    <button type="button" class="btn btn-outline-primary mt-5 w-100" data-bs-toggle="modal" data-bs-target="">Acheter</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="pq-service-img">
                            <img class="" src="{{ asset('front-tools/img2/fitness-room-1178293_1280.jpg') }}" height="150px">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">Nom de l'equipement</h6>
                            <p class="card-text">
                            <h6>Description</h6>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                                alteration in some form</p>
                            </p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>30000 XOF</h6>
                                </div>
                                <div class="col-lg-6 text-end">
                                    <span class="badge text-bg-dark">
                                        <h6 class="text-white">Indisponible</h6>
                                    </span>
                                </div>
                            </div>
                            <button type="button" class="btn btn-outline-primary mt-5 w-100" data-bs-toggle="modal" data-bs-target="">Acheter</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="pq-service-img">
                            <img class="" src="{{ asset('front-tools/img2/pexels-victorfreitas-949130.jpg') }}" height="150px">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">Nom de l'equipement</h6>
                            <p class="card-text">
                            <h6>Description</h6>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                                alteration in some form</p>
                            </p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6>30000 XOF</h6>
                                </div>
                                <div class="col-lg-6 text-end">
                                    <span class="badge text-bg-danger">
                                        <h6 class="text-white">Disponible</h6>
                                    </span>
                                </div>
                            </div>
                            <button type="button" class="btn btn-outline-primary mt-5 w-100" data-bs-toggle="modal" data-bs-target="">Acheter</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- pagination -->
        <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
    </div>
</section>

@endsection
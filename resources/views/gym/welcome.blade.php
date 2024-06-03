@extends('layouts.guest')
@section('content')

<section>
    <div class="container ">
        <div class="container text-center mb-5">
            <h1>Bienvenu sur {{env('APP_NAME')}}</h1>
            <p>Notre platforme vous propose nos différents salles de gym, ainsi que leur offres et services.</p>
        </div>

        <div class="row ">
            <div class="col-lg-4">
                <a href="{{route('gym.rooms.overview')}}">
                    <div class="card card-product">
                        <div class="pq-service-img">
                            <img class="" src="{{ asset('front-tools/template-frontoffice/img/pexels-heyho-7031706.jpg') }}" alt="service-image">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Nom de la salle</h5>
                            <h6>Tel: 59125822</h6>
                            <h6>Email: fitness@gmail.com</h6>
                            <h6>Site Web: siteweb.com</h6>
                            <h6><span class="badge rounded-pill text-bg-info">PROMOTION</span></h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- pagination -->
    <div class="mt-5">
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
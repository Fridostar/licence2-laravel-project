<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('template/application/css/bootstrap.min.css') }}">
<!--  Style CSS -->
<link rel="stylesheet" href="{{ asset('template/application/css/style.css') }}">

<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalbasic">Abonnement</button>


<div class="modal fade" id="modalbasic" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">INSCRIPTION</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="close"><span aria-hidden="true"></span></button>
            </div>
            <div class="modal-body ">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Est numquam perspiciatis soluta at eveniet odio architecto sunt placeat explicabo unde facilis, dignissimos similique voluptate voluptatum blanditiis delectus repellat error inventore.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalcenter">S'abonner</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalcenter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content ">

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Payer plus tard</button>
                    </div>
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-success w-100" data-bs-dismiss="modal">Payer Maintenant</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!--bootstrap js-->
<script src="{{ asset('template/application/js/bootstrap.min.js') }}"></script>
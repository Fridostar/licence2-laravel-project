<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('manager.outfit.update', $outfit->id) }}" class="row g-3">
        @csrf
        @method('PUT')
        
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier le type d'abonnement</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="close"><span aria-hidden="true"></span></button>
                </div>

                <div class="modal-body ">
                    <div class="row">

                        <div class="row">
                            <div class="col-lg-8 mb-3">
                                @include('shared.form.input', [ 'label' => "Nom de l'équipement", 'name' => "name", 'value' => "$outfit->name", 'type' => "text", 'placeholder' => "Entrer le nom de l'équipement"])
                            </div>

                            <div class="col-lg-4">
                                @include('shared.form.input', [ 'label' => "Prix de vente (Fcfa)", 'name' => "sale_price", 'value' => "$outfit->sale_price", 'type' => "number", 'placeholder' => "Entrer le prix de l'équipement"])
                            </div>
                        </div>


                        <div class="col-lg-12 mb-3">
                        @include('shared.form.textarea', [ 'label' => "Description", 'name' => "description", 'value' => "$outfit->description", 'placeholder' => "Entrer une description"])
                        </div>

                        <div class="row">
                            <div class="col-lg-10 mb-3">
                                @include('shared.form.input', ['label' => "Image de couverture", 'name' => "cover_image", 'value' => "$outfit->cover_image", 'type' => "file", 'placeholder' => "Choisissez une image"])
                            </div>

                            <div class="col-lg-2 mb-3 form-check form-switch">
                                <br><br>
                                @include('shared.form.checkswitch', ['label' => 'Disponible?', 'name' => 'status', 'value' => $outfit->status])
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-center">
                    <button class="btn btn-dark mx-5" data-bs-dismiss="modal" aria-label="close">Annuler</button>
                    <button class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#modalcenter">Modifier</button>
                </div>
            </div>
        </div>
    </form>
</div>
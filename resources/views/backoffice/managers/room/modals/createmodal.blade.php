<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('manager.room.store') }}" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method('POST')
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter une salle</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="close"><span aria-hidden="true"></span></button>
                </div>

                <div class="modal-body ">
                    <div class="row">
                        <div class="row">
                            <div class="col-lg-5 mb-3">
                                @include('shared.form.input', [ 'label' => "Nom de salle", 'name' => "name", 'type' => "text", 'placeholder' => "Entrer le nom de la salle"])
                            </div>
                            <div class="col-lg-7 mb-3">
                            @include('shared.form.input', [ 'label' => "L'url du site", 'name' => "site_url", 'type' => "text", 'placeholder' => "Entrer l'url du site de votre salle"])
                        </div>


                        </div>
                        
                        <div class="col-lg-12 mb-3">
                            @include('shared.form.textarea', [ 'label' => "Description", 'name' => "description", 'placeholder' => "Entrer une description de votre salle"])
                        </div>

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                @include('shared.form.input', ['label' => "Image de la salle", 'name' => "cover_image", 'type' => "file", 'placeholder' => "Choisissez une image à votre salle"])
                            </div>
                            <div class="col-lg-6 mb-3">
                                @include('shared.form.file', ['label' => "Image de couverture", 'name' => "overview_image"])
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-10 mb-3">
                                @include('shared.form.selectmultiple', ['label' => 'Equipements', 'name' => 'outfits', 'value' => $room->outfits()->pluck('id'), 'outfits' => $outfits, 'multiple' => true])
                            </div>
                            <div class="col-lg-2 mb-3 form-check form-switch">
                                <br><br>
                                @include('shared.form.checkswitch', [ 'label' => 'Disponible?', 'name' => 'status' ] )

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-center">
                    <button class="btn btn-dark" data-bs-dismiss="modal" aria-label="close">Annuler</button>
                    <button class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#modalcenter">Créer</button>
                </div>
            </div>
        </div>
    </form>
</div>
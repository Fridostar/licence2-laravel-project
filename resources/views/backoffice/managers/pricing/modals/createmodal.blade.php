<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <form method="POST" action="{{ route('manager.pricing.store') }}" class="row g-3">
        @csrf
        <div class="modal-dialog modal-default">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un type d'abonnement</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="close"><span aria-hidden="true"></span></button>
                </div>

                <div class="modal-body ">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <div class="mb-3">
                                <label for="name" class="form-label">Titre abonnement :</label>
                                <input name="name" value="{{old('name')}}" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Le titre de l'abonnement" required>
                            </div>
                            <span class="text-danger">
                                @error('name')
                                <small class="text-tiny">{{$message}}</small>
                                @enderror
                            </span>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <div class="mb-3">
                                <label for="duration" class="form-label">Périod (jours) :</label>
                                <input name="duration" value="{{old('duration')}}" type="number" class="form-control @error('duration') is-invalid @enderror" id="duration" placeholder="La durée de l'abonnement" required>
                            </div>
                            <span class="text-danger">
                                @error('duration')
                                <small class="text-tiny">{{$message}}</small>
                                @enderror
                            </span>
                        </div>

                        <div class="col-lg-12 mb-3">
                            <div class="mb-3">
                                <label for="price" class="form-label">Prix :</label>
                                <input name="price" value="{{old('price')}}" type="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Le prix de l'abonnement" required>
                            </div>
                            <span class="text-danger">
                                @error('price')
                                <small class="text-tiny">{{$message}}</small>
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-center">
                    <button class="btn btn-dark " data-bs-dismiss="modal" aria-label="close">Annuler</button>
                    <button class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#modalcenter">Créer</button>
                </div>
            </div>
        </div>
    </form>
</div>
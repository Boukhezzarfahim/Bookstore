<div class="row p-4 pt-5">
    <div class="col-md-8 col-lg-6 mx-auto">
        <!-- Formulaire de création d'un nouvel auteur -->
        <div class="card ">
            <div class="card-header card-header bg-turquoise text-white">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de création d'un nouvel auteur</h3>
            </div>
            <!-- /.card-header -->
            <!-- Form start -->
            <form role="form" wire:submit.prevent="addAuteur()" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" wire:model="newAuteur.nom" class="form-control @error('newAuteur.nom') is-invalid @enderror">
                            @error('newAuteur.nom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="prenom">Prénom</label>
                            <input type="text" id="prenom" wire:model="newAuteur.prenom" class="form-control @error('newAuteur.prenom') is-invalid @enderror">
                            @error('newAuteur.prenom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="sexe">Sexe</label>
                        <select id="sexe" class="form-control @error('newAuteur.sexe') is-invalid @enderror" wire:model="newAuteur.sexe">
                            <option value="">Sélectionner</option>
                            <option value="H">Homme</option>
                            <option value="F">Femme</option>
                        </select>
                        @error('newAuteur.sexe')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer d-flex justify-content-between">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Enregistrer</button>
                    <button type="button" wire:click="goToListAuteur()" class="btn btn-danger"><i class="fas fa-arrow-left"></i></button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>

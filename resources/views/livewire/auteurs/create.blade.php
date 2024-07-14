<div class="row p-4 pt-5">
    <div class="col-md-6">
        <!-- Formulaire de création d'un nouvel auteur -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de création d'un nouvel auteur</h3>
            </div>
            <!-- /.card-header -->
            <!-- Form start -->
            <form role="form" wire:submit.prevent="addAuteur()" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Nom</label>
                            <input type="text" wire:model="newAuteur.nom" class="form-control @error('newAuteur.nom') is-invalid @enderror">
                            @error('newAuteur.nom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label>Prénom</label>
                            <input type="text" wire:model="newAuteur.prenom" class="form-control @error('newAuteur.prenom') is-invalid @enderror">
                            @error('newAuteur.prenom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Sexe</label>
                        <select class="form-control @error('newAuteur.sexe') is-invalid @enderror" wire:model="newAuteur.sexe">
                            <option value="">Sélectionner</option>
                            <option value="H">Homme</option>
                            <option value="F">Femme</option>
                        </select>
                        @error('newAuteur.sexe')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

               
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <button type="button" wire:click="goToListAuteur()" class="btn btn-danger">Retourner à la liste des auteurs</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>

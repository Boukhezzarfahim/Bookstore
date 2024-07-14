<div class="row p-4 pt-5">
    <div class="col-md-6">
        <!-- Formulaire d'édition d'un auteur -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-edit fa-2x"></i> Formulaire d'édition d'un auteur</h3>
            </div>
            <!-- /.card-header -->
            <!-- Form start -->
            <form role="form" wire:submit.prevent="updateAuteur()" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Nom</label>
                            <input type="text" wire:model="editAuteur.nom" class="form-control @error('editAuteur.nom') is-invalid @enderror">
                            @error('editAuteur.nom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label>Prénom</label>
                            <input type="text" wire:model="editAuteur.prenom" class="form-control @error('editAuteur.prenom') is-invalid @enderror">
                            @error('editAuteur.prenom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Sexe</label>
                        <select class="form-control @error('editAuteur.sexe') is-invalid @enderror" wire:model="editAuteur.sexe">
                            <option value="">Sélectionner</option>
                            <option value="H" @if($editAuteur['sexe'] === 'H') selected @endif>Homme</option>
                            <option value="F" @if($editAuteur['sexe'] === 'F') selected @endif>Femme</option>
                        </select>
                        @error('editAuteur.sexe')
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

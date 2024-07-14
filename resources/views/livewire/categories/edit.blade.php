<div class="row p-4 pt-5">
    <div class="col-md-6">
        <!-- Formulaire d'édition d'une édition -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-edit fa-2x"></i> Formulaire d'édition d'une catégorie</h3>
            </div>
            <!-- /.card-header -->
            <!-- Form start -->
            <form role="form" wire:submit.prevent="updateCategorie">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nom de la catégorie</label>
                        <input type="text" wire:model="editCategorie.nom" class="form-control @error('editCategorie.nom') is-invalid @enderror">
                        @error('editCategorie.nom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <button type="button" wire:click="goToListCategorie" class="btn btn-danger">Retourner à la liste des catégories</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>

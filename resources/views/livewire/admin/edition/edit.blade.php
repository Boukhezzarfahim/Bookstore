<div class="row p-4 pt-5">
    <div class="col-md-6">
        <!-- Formulaire d'édition d'une édition -->
        <div class="card">
            <div class="card-header  bg-turquoise text-white">
                <h3 class="card-title"><i class="fas fa-edit fa-2x"></i> Formulaire d'édition d'une édition</h3>
            </div>
            <!-- /.card-header -->
            <!-- Form start -->
            <form role="form" wire:submit.prevent="updateEdition">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nom de l'Édition</label>
                        <input type="text" wire:model="editEdition.nom_edition" class="form-control @error('editEdition.nom_edition') is-invalid @enderror">
                        @error('editEdition.nom_edition')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer d-flex justify-content-between">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Enregistrer</button>
                    <button type="button" wire:click="goToListEdition()" class="btn btn-danger"><i class="fas fa-arrow-left"></i></button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>

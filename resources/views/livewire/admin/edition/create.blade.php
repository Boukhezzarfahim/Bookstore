<div class="row p-4 pt-5">
    <div class="col-md-6">
        <!-- Formulaire de création d'une nouvelle édition -->
        <div class="card">
            <div class="card-header bg-turquoise text-white">
                <h3 class="card-title"><i class="fas fa-plus fa-2x"></i> Formulaire de création d'une nouvelle édition</h3>
            </div>
            <!-- /.card-header -->
            <!-- Form start -->
            <form role="form" wire:submit.prevent="addEdition">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nom de l'Édition</label>
                        <input type="text" wire:model="newEdition.nom_edition" class="form-control @error('newEdition.nom_edition') is-invalid @enderror">
                        @error('newEdition.nom_edition')
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

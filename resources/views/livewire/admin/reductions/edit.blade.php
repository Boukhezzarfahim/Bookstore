<div class="row justify-content-center p-4 pt-5">
    <div class="col-md-8">
        <!-- Formulaire d'édition d'une réduction -->
        <div class="card ">
            <div class="card-header bg-turquoise text-white d-flex align-items-center">
                <h3 class="card-title text-white">
                    <i class="fas fa-edit fa-2x"></i> Formulaire d'édition d'une réduction
                </h3>
            </div>
            <!-- /.card-header -->
            <!-- Form start -->
            <form role="form" wire:submit.prevent="updateReduction">
                <div class="card-body">
                    <div class="form-group">
                        <label for="reduction">
                            <i class="fas fa-tag"></i> Nom de la réduction
                        </label>
                        <input type="text" id="reduction" wire:model="editReduction.reduction" class="form-control @error('editReduction.reduction') is-invalid @enderror" placeholder="Entrez le nom de la réduction">
                        @error('editReduction.reduction')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer d-flex justify-content-between">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Enregistrer</button>
                    <button type="button" wire:click="goToListReduction()" class="btn btn-danger"><i class="fas fa-arrow-left"></i></button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>

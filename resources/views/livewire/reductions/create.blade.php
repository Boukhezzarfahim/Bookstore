<div class="row justify-content-center p-4 pt-5">
    <div class="col-md-8">
        <!-- Formulaire de création d'une nouvelle réduction -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-percent fa-2x"></i>
                    Formulaire de création d'une nouvelle réduction
                </h3>
            </div>
            <!-- /.card-header -->
            <!-- Form start -->
            <form role="form" wire:submit.prevent="addReduction">
                <div class="card-body">
                    <div class="form-group">
                        <label for="reduction">
                            <i class="fas fa-tag"></i> Pourcentage de réduction
                        </label>
                        <input type="text" id="reduction" wire:model="newReduction.reduction" class="form-control @error('newReduction.reduction') is-invalid @enderror" placeholder="Entrez le pourcentage de réduction">
                        @error('newReduction.reduction')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Enregistrer
                    </button>
                    <button type="button" wire:click="goToListReduction" class="btn btn-danger">
                        <i class="fas fa-arrow-left"></i> Retourner à la liste des réductions
                    </button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>

<div class="container-fluid p-4 d-flex justify-content-center">
    <div class="row w-100 justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-turquoise text-white text-center">
                    <h3 class="card-title">Détails du contact</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if($selectedContact)
                        <div class="row mb-4">
                            <div class="col-md-10 mx-auto">
                                <p><strong>Nom:</strong> {{ $selectedContact->nom }}</p>
                                <p><strong>Prénom:</strong> {{ $selectedContact->prenom }}</p>
                                <p><strong>Email:</strong> {{ $selectedContact->email }}</p>
                                <p><strong>Téléphone:</strong> {{ $selectedContact->telephone }}  </p>

                                <p><strong>Message:</strong> {{ $selectedContact->message }}</p>
                            </div>
                        </div>
                    @else
                        <p>Aucun contact sélectionné.</p>
                    @endif
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    <button wire:click="goBack()" class="btn btn-secondary">Retour à la liste</button>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

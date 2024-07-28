<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card shadow-sm border-light">
            <div class="card-header bg-turquoise text-white d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                <h3 class="card-title flex-grow-1 mb-2 mb-sm-0"><i class="fa fa-list fa-2x"></i> Liste des contacts</h3>
                <div class="card-tools d-flex flex-column flex-sm-row align-items-start align-items-sm-center mt-2 mt-sm-0">
                    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                        <div class="mb-2 mb-sm-0 mr-sm-2">
                         
                        </div>
                        <div class="input-group input-group-md" style="width: 100%; max-width: 250px;">
                            <input type="text" name="table_search" wire:model.debounce.250ms="search" class="form-control" placeholder="Recherche">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-light text-dark"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-head-fixed table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Nom et Prénom</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->nom }} {{ $contact->prenom }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>
                                    <!-- Détails -->
                                    <button wire:click="goToContactDetails({{ $contact->id }})" class="btn btn-info btn-sm" title="Afficher le message">
                                        <i class="fas fa-info-circle"></i>
                                    </button>
                                    <!-- Supprimer -->
                                    <button wire:click="confirmDelete({{ $contact->id }})" class="btn btn-danger btn-sm" title="Supprimer">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">
                                    <div class="alert alert-danger mb-0">
                                        <h5><i class="icon fas fa-ban"></i> Information!</h5>
                                        Aucune donnée trouvée par rapport aux éléments de recherche entrés.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>

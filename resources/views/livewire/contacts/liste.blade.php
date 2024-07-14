<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1">
                    <i class="fa fa-list fa-2x"></i> Liste des Contacts
                </h3>
                <div class="card-tools d-flex align-items-center">
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" wire:model.debounce.250ms="search" class="form-control float-right" placeholder="Rechercher...">
                        <div class="input-group-append">
                            <button class="btn btn-default" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-head-fixed table-striped">
                    <thead>
                        <tr>
                            <th>Nom et prénom</th>
                           
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
                                <td colspan="4">
                                    <div class="alert alert-danger">
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
                <div class="float-right">
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>

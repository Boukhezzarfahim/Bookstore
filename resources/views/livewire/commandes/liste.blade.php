<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1">
                    <i class="fa fa-list fa-2x"></i> Liste des Commandes
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
                <div class="d-flex justify-content-end p-2 bg-blue">
                    <div class="form-group mr-3">
                        <label for="filtreStatut">Filtrer par statut</label>
                        <select id="filtreStatut" wire:model="filtreStatut" class="form-control">
                            <option value="">Tous</option>
                            <option value="En attente">En attente</option>
                            <option value="Approuvée">Approuvée</option>
                            <option value="Annulée">Annulée</option>
                        </select>
                    </div>
                </div>
                <table class="table table-head-fixed table-striped">
                    <thead>
                        <tr>
                            <th>Nom et prénom</th>
                            <th>Téléphone</th>
                            <th>Date de commande</th>
                            <th>Montant total</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($commandes as $commande)
                            <tr>
                                <td>{{ $commande->nom }} - {{ $commande->prenom }}</td>
                                <td>{{ $commande->telephone }}</td>
                                <td>{{ $commande->date_commande }}</td>
                                <td>{{ $commande->montant_total }} $</td>
                                <td>
                                    @php
                                        $badgeClass = 'badge-secondary'; // Classe par défaut
                                        switch($commande->statut) {
                                            case 'En attente':
                                                $badgeClass = 'badge-warning';
                                                break;
                                            case 'Approuvée':
                                                $badgeClass = 'badge-success';
                                                break;
                                            case 'Annulée':
                                                $badgeClass = 'badge-danger';
                                                break;
                                        }
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">
                                        {{ $commande->statut }}
                                    </span>
                                </td>
                                <td>
                                    <!-- Détails -->
                                    <button wire:click="goToCommandeDetails({{ $commande->id }})" class="btn btn-info btn-sm" title="Détails">
                                        <i class="fas fa-info-circle"></i>
                                    </button>

                                    <!-- Approuver -->
                                    <button wire:click="approveCommande({{ $commande->id }})" class="btn btn-success btn-sm" title="Approuver">
                                        <i class="fas fa-check"></i>
                                    </button>

                                    <!-- Annuler -->
                                    <button wire:click="cancelCommande({{ $commande->id }})" class="btn btn-warning btn-sm" title="Annuler">
                                        <i class="fas fa-times"></i>
                                    </button>

                                    <!-- Supprimer -->
                                    <button wire:click="confirmDelete({{ $commande->id }})" class="btn btn-danger btn-sm" title="Supprimer">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
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
        </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="float-right">
                    {{ $commandes->links() }}
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>

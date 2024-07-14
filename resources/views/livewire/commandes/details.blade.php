<div class="container-fluid p-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h3 class="card-title">Détails de la commande</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if($selectedCommande)
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <p><strong>Nom:</strong> {{ $selectedCommande->nom }}</p>
                                <p><strong>Prénom:</strong> {{ $selectedCommande->prenom }}</p>
                                <p><strong>Email:</strong> {{ $selectedCommande->email }}</p>
                                <p><strong>Téléphone:</strong> {{ $selectedCommande->telephone }}</p>
                                <p><strong>Date de commande:</strong> {{ $selectedCommande->date_commande }}</p>
                                <p><strong>Montant total:</strong> {{ $selectedCommande->montant_total }}$</p>
                                <p><strong>Statut:</strong> {{ $selectedCommande->statut }}</p>
                            </div>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Livre</th>
                                        <th>Quantité</th>
                                        <th>Prix Unitaire</th>
                                        <th>Montant Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($selectedCommande->lignesCommande as $ligne)
                                        <tr>
                                            <td>{{ $ligne->livre->titre }}</td>
                                            <td>{{ $ligne->quantite }}</td>
                                            <td>{{ $ligne->prix_unitaire }}$</td>
                                            <td>{{ $ligne->quantite * $ligne->prix_unitaire }}$</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>Aucune commande sélectionnée.</p>
                    @endif
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button wire:click="goBack()" class="btn btn-secondary">Retour à la liste</button>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

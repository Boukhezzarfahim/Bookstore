<div class="container mt-4">

    @if ($errors->any())
        <div class="alert alert-danger fade show">
            <h5><i class="icon fas fa-ban"></i> Erreurs!</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form wire:submit.prevent="ajoutLivre">
        <div class="row">
            <!-- Partie Gauche : Informations principales -->
            <div class="col-md-6">
                <!-- Champs principaux -->
                <div class="form-group">
                    <label for="titre" class="font-weight-bold"><i class="fas fa-book"></i> Titre</label>
                    <input type="text" id="titre" wire:model="addLivre.titre" class="form-control form-control-sm" placeholder="Entrez le titre du livre">
                </div>
                <div class="form-group">
                    <label for="isbn" class="font-weight-bold"><i class="fas fa-barcode"></i> ISBN</label>
                    <input type="text" id="isbn" wire:model="addLivre.ISBN" class="form-control form-control-sm" placeholder="Entrez l'ISBN">
                </div>
                <div class="form-group">
                    <label for="auteur" class="font-weight-bold"><i class="fas fa-user"></i> Auteur</label>
                    <select id="auteur" class="form-control form-control-sm" wire:model="addLivre.auteur_id">
                        <option value="">Sélectionner un auteur</option>
                        @foreach ($auteurs as $auteur)
                            <option value="{{ $auteur->id }}">{{ $auteur->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="editeur" class="font-weight-bold"><i class="fas fa-industry"></i> Éditeur</label>
                    <select id="editeur" class="form-control form-control-sm" wire:model="addLivre.edition_id">
                        <option value="">Sélectionner un éditeur</option>
                        @foreach ($editeurs as $editeur)
                            <option value="{{ $editeur->id }}">{{ $editeur->nom_edition }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="reduction" class="font-weight-bold"><i class="fas fa-percent"></i> Réduction</label>
                    <select id="reduction" class="form-control form-control-sm" wire:model="addLivre.reduction_id">
                        <option value="">Sélectionner un pourcentage de réduction</option>
                        @foreach ($reductions as $reduction)
                            <option value="{{ $reduction->id }}">{{ $reduction->reduction }} %</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="categorie" class="font-weight-bold"><i class="fas fa-tags"></i> Catégorie</label>
                    <select id="categorie" class="form-control form-control-sm" wire:model="addLivre.categorie_id">
                        <option value="">Sélectionner une catégorie</option>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="disponibilite" class="font-weight-bold"><i class="fas fa-check-circle"></i> Disponibilité</label>
                    <select id="disponibilite" class="form-control form-control-sm" wire:model="addLivre.disponibilite">
                        <option value="disponible">Disponible</option>
                        <option value="non disponible">Indisponible</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description" class="font-weight-bold"><i class="fas fa-pencil-alt"></i> Description</label>
                    <textarea id="description" wire:model="addLivre.description" class="form-control form-control-sm" placeholder="Entrez une description"></textarea>
                </div>
            </div>

            <!-- Partie Droite : Image et Infos supplémentaires -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="image" class="font-weight-bold"><i class="fas fa-image"></i> Image</label>
                    <input type="file" id="image" wire:model="addPhoto" class="form-control-file">
                </div>
                <div class="border p-2 mb-3" style="border-radius: 10px; height: 150px; width: 100%; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); display: flex; align-items: center; justify-content: center;">
                    @if ($addPhoto)
                        <img src="{{ $addPhoto->temporaryUrl() }}" style="max-height: 150px; max-width: 100%; object-fit: cover;">
                    @endif
                </div>

                <!-- Champs supplémentaires -->
                <div class="form-group">
                    <label for="genre_d" class="font-weight-bold"><i class="fas fa-tag"></i> Genre</label>
                    <input type="text" id="genre_d" wire:model="addLivre.genre" class="form-control form-control-sm" placeholder="Entrez le genre">
                </div>
                <div class="form-group">
                    <label for="prix_d" class="font-weight-bold"><i class="fas fa-money-bill-wave"></i> Prix</label>
                    <input type="number" id="prix_d" step="0.01" wire:model="addLivre.prix" class="form-control form-control-sm" placeholder="Entrez le prix">
                </div>
                <div class="form-group">
                    <label for="ancien_prix_d" class="font-weight-bold"><i class="fas fa-dollar-sign"></i> Ancien Prix</label>
                    <input type="number" id="ancien_prix_d" step="0.01" wire:model="addLivre.ancien_prix" class="form-control form-control-sm" placeholder="Entrez l'ancien prix">
                </div>
                <div class="form-group">
                    <label for="date_publication" class="font-weight-bold"><i class="fas fa-calendar-alt"></i> Date de publication</label>
                    <input type="date" id="date_publication" wire:model="addLivre.date_publication" class="form-control form-control-sm">
                </div>
                <div class="form-group">
                    <label for="nouveau" class="font-weight-bold"><i class="fas fa-star"></i> Nouveau</label>
                    <select id="nouveau" class="form-control form-control-sm" wire:model="addLivre.nouveau">
                        <option value="1">Oui</option>
                        <option value="0">Non</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group mt-4 text-center">
            <button type="submit" class="btn btn-success btn-sm mr-2"><i class="fas fa-plus"></i> Ajouter</button>
            <button type="button" wire:click="goToListLivre" class="btn btn-secondary btn-sm"><i class="fas fa-list"></i> Retour à la liste</button>
        </div>
    </form>
</div>

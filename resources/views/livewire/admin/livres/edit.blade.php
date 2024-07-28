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

    <form wire:submit.prevent="updateLivre" enctype="multipart/form-data">
        <div class="row">
            <!-- Partie Gauche : Informations principales -->
            <div class="col-md-6">
                <!-- Champs principaux -->
                <div class="form-group">
                    <label for="titre" class="font-weight-bold"><i class="fas fa-book"></i> Titre</label>
                    <input type="text" id="titre" wire:model.defer="editLivre.titre" class="form-control form-control-sm" placeholder="Entrez le titre du livre">
                    @error('editLivre.titre') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="isbn" class="font-weight-bold"><i class="fas fa-barcode"></i> ISBN</label>
                    <input type="text" id="isbn" wire:model.defer="editLivre.ISBN" class="form-control form-control-sm" placeholder="Entrez l'ISBN">
                    @error('editLivre.ISBN') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="auteur" class="font-weight-bold"><i class="fas fa-user"></i> Auteur</label>
                    <select id="auteur" class="form-control form-control-sm" wire:model.defer="editLivre.auteur_id">
                        <option value="">Sélectionner un auteur</option>
                        @foreach ($auteurs as $auteur)
                            <option value="{{ $auteur->id }}">{{ $auteur->nom }}</option>
                        @endforeach
                    </select>
                    @error('editLivre.auteur_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="editeur" class="font-weight-bold"><i class="fas fa-industry"></i> Éditeur</label>
                    <select id="editeur" class="form-control form-control-sm" wire:model.defer="editLivre.edition_id">
                        <option value="">Sélectionner un éditeur</option>
                        @foreach ($editeurs as $editeur)
                            <option value="{{ $editeur->id }}">{{ $editeur->nom_edition }}</option>
                        @endforeach
                    </select>
                    @error('editLivre.edition_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="reduction" class="font-weight-bold"><i class="fas fa-percent"></i> Réduction</label>
                    <select id="reduction" class="form-control form-control-sm" wire:model.defer="editLivre.reduction_id">
                        <option value="">Sélectionner un pourcentage de réduction</option>
                        @foreach ($reductions as $reduction)
                            <option value="{{ $reduction->id }}">{{ $reduction->reduction }} %</option>
                        @endforeach
                    </select>
                    @error('editLivre.reduction_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                
                
                <div class="form-group">
                    <label for="categorie" class="font-weight-bold"><i class="fas fa-tags"></i> Catégorie</label>
                    <select id="categorie" class="form-control form-control-sm" wire:model.defer="editLivre.categorie_id">
                        <option value="">Sélectionner une catégorie</option>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                        @endforeach
                    </select>
                    @error('editLivre.categorie_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="genre" class="font-weight-bold"><i class="fas fa-tag"></i> Genre</label>
                    <input type="text" id="genre" wire:model.defer="editLivre.genre" class="form-control form-control-sm" placeholder="Entrez le genre">
                    @error('editLivre.genre') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="font-weight-bold"><i class="fas fa-pencil-alt"></i> Description</label>
                    <textarea id="description" wire:model.defer="editLivre.description" class="form-control form-control-sm" placeholder="Entrez une description"></textarea>
                    @error('editLivre.description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
             
              
            </div>

            <!-- Partie Droite : Image et Infos supplémentaires -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="image" class="font-weight-bold"><i class="fas fa-image"></i> Image</label>
                    <input type="file" id="image" wire:model="image" class="form-control-file">
                    @if ($editLivre['image'])
                        <div class="border p-2 mb-3" style="border-radius: 10px; height: 150px; width: 100%; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); display: flex; align-items: center; justify-content: center;">
                            <img src="{{ asset($editLivre['image']) }}" style="max-height: 150px; max-width: 100%; object-fit: cover;">
                        </div>
                    @endif
                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div wire:loading wire:target="image">Uploading...</div>

                <div class="form-group">
                    <label for="nouveau" class="font-weight-bold"><i class="fas fa-star"></i> Nouveau</label>
                    <select id="nouveau" class="form-control form-control-sm" wire:model.defer="editLivre.nouveau">
                        <option value="">Sélectionnez une option</option>
                        <option value="1" {{ $editLivre['nouveau'] == '1' ? 'selected' : '' }}>Oui</option>
                        <option value="0" {{ $editLivre['nouveau'] == '0' ? 'selected' : '' }}>Non</option>
                    </select>
                    @error('editLivre.nouveau') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="disponibilite" class="font-weight-bold"><i class="fas fa-check-circle"></i> Disponibilité</label>
                    <select id="disponibilite" class="form-control form-control-sm" wire:model.defer="editLivre.disponibilite">
                        <option value="disponible">Disponible</option>
                        <option value="non disponible">Indisponible</option>
                    </select>
                    @error('editLivre.disponibilite') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="date_publication" class="font-weight-bold"><i class="fas fa-calendar-alt"></i> Date de publication</label>
                    <input type="date" id="date_publication" wire:model.defer="editLivre.date_publication" class="form-control form-control-sm">
                    @error('editLivre.date_publication') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="prix" class="font-weight-bold"><i class="fas fa-money-bill-wave"></i> Prix</label>
                    <input type="number" id="prix" step="0.01" wire:model.defer="editLivre.prix" class="form-control form-control-sm" placeholder="Entrez le prix">
                    @error('editLivre.prix') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="ancien_prix" class="font-weight-bold"><i class="fas fa-dollar-sign"></i> Ancien Prix</label>
                    <input type="number" id="ancien_prix" step="0.01" wire:model.defer="editLivre.ancien_prix" class="form-control form-control-sm" placeholder="Entrez l'ancien prix">
                    @error('editLivre.ancien_prix') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                
            </div>
        </div>
        
        <div class="form-group mt-4 text-center">

            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Mettre à jour</button>
            <button type="button" wire:click="goToListLivre" class="btn btn-secondary"><i class="fas fa-list"></i> Retour à la liste</button>
        </div>
    </form>
</div>

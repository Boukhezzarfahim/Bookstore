<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card shadow-sm border-light">
            <div class="card-header bg-turquoise text-white d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                <h3 class="card-title flex-grow-1 mb-2 mb-sm-0">
                    <i class="fa fa-list fa-2x"></i> Liste des livres
                </h3>
                <div class="card-tools d-flex flex-column flex-sm-row align-items-start align-items-sm-center mt-2 mt-sm-0">
                    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                        <div class="mb-2 mb-sm-0 mr-sm-2">
                            <a class="btn btn-light text-dark" wire:click.prevent="goToAddUser()" style="min-width: 200px;">
                                <i class="fas fa-plus-circle"></i> Nouveau livre
                            </a>
                        </div>
                        <div class="input-group input-group-md" style="width: 100%; max-width: 250px;">
                            <input type="text" name="table_search" wire:model.debounce.250ms="search" class="form-control" placeholder="Recherche">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-light text-dark">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="d-flex flex-column flex-sm-row p-3">
                    <!-- Conteneur pour les filtres avec une largeur égale -->
                    <div class="w-100 w-sm-50 pr-sm-2 mb-2 mb-sm-0">
                        <div class="form-group">
                            <label for="filtreCategorie" class="font-weight-bold">
                                <i class="fas fa-tags"></i> Filtrer par catégorie
                            </label>
                            <select id="filtreCategorie" wire:model="filtreCategorie" class="form-control">
                                <option value=""></option>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="w-100 w-sm-50 pl-sm-2">
                        <div class="form-group">
                            <label for="filtreDisponibilite" class="font-weight-bold">
                                <i class="fas fa-check-circle"></i> Filtrer par état
                            </label>
                            <select id="filtreDisponibilite" wire:model="filtreDisponibilite" class="form-control">
                                <option value=""></option>
                                <option value="disponible">Disponible</option>
                                <option value="non disponible">Indisponible</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="table-container p-3">
                    <table class="table table-hover table-striped">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center align-middle"><i class="fas fa-image fa-xs"></i> Image</th>
                                <th class="text-center align-middle"><i class="fas fa-book fa-xs"></i> Livres et auteurs</th>
                                <th class="text-center align-middle"><i class="fas fa-tags fa-xs"></i> Catégorie</th>
                                <th class="text-center align-middle"><i class="fas fa-info-circle fa-xs"></i> État</th>
                                <th class="text-center align-middle"><i class="fas fa-calendar-alt fa-xs"></i> Ajouté</th>
                                <th class="text-center align-middle"><i class="fas fa-cogs fa-xs"></i> Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @forelse ($livres as $livre)
                                <tr>
                                    <td>
                                        <img src="{{ asset($livre->image) }}" alt="" class="img-fluid rounded" style="max-width: 100px;">
                                    </td>
                                    <td>{{ $livre->titre }} - {{ $livre->auteur->nom }} {{ $livre->auteur->prenom }}</td>
                                    <td class="text-center">{{ optional($livre->categorie)->nom }}</td>
                                    <td class="text-center">
                                        @if($livre->disponibilite === 'disponible')
                                            <span class="badge bg-success text-white">Disponible</span>
                                        @else
                                            <span class="badge bg-danger text-white">Indisponible</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ optional($livre->created_at)->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-primary btn-sm" wire:click="goToEditLivre({{ $livre->id }})">
                                            <i class="far fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">
                                        <div class="alert alert-warning mb-0">
                                            <h5><i class="fas fa-exclamation-triangle"></i> Information!</h5>
                                            Aucune donnée trouvée par rapport aux éléments de recherche entrés.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                {{ $livres->links() }}
            </div>
        </div>
    </div>
</div>

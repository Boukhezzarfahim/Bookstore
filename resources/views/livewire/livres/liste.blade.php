<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card shadow-sm border-light">
            <div class="card-header bg-primary text-white d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fa fa-list fa-2x"></i> Liste des livres</h3>
                <div class="card-tools d-flex align-items-center">
                    <a class="btn btn-light text-primary mr-4" wire:click.prevent="goToAddUser()">
                        <i class="fas fa-plus-circle"></i> Nouveau livre
                    </a>
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" name="table_search" wire:model.debounce.250ms="search" class="form-control" placeholder="Recherche">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-light text-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="d-flex p-3">
                    <!-- Conteneur pour les filtres avec une largeur égale -->
                    <div class="w-50 pr-2">
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
                    <div class="w-50 pl-2">
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
                <div style="height:350px;">
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th><i class="fas fa-image"></i> Image</th>
                                <th><i class="fas fa-book"></i> Livres et auteurs</th>
                                <th class="text-center"><i class="fas fa-tags"></i> Catégorie</th>
                                <th class="text-center"><i class="fas fa-info-circle"></i> État</th>
                                <th class="text-center"><i class="fas fa-calendar-alt"></i> Ajouté</th>
                                <th class="text-center"><i class="fas fa-cogs"></i> Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @forelse ($livres as $livre)
                                <tr>
                                    <td>
                                        <img src="{{ asset($livre->image) }}" alt="" class="img-thumbnail" style="width:60px; height:60px;">
                                    </td>
                                    <td>{{ $livre->titre }} - {{ $livre->auteur->nom }} {{ $livre->auteur->prenom }} </td>
                                    <td class="text-center">
                                        {{ optional($livre->categorie)->nom }}
                                    </td>
                                    <td class="text-center">
                                        @if($livre->disponibilite === 'disponible')
                                            <span class="badge badge-success">Disponible</span>
                                        @else
                                            <span class="badge badge-danger">Indisponible</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ optional($livre->created_at)->diffForHumans() }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-link text-primary" wire:click="goToEditLivre({{ $livre->id }})">
                                            <i class="far fa-edit"></i>
                                        </button>
                                        {{-- <button class="btn btn-link text-danger" wire:click="confirmDelete({{ $livre->id }})">
                                            <i class="far fa-trash-alt"></i>
                                        </button> --}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="alert alert-warning">
                                            <h5><i class="icon fas fa-exclamation-triangle"></i> Information!</h5>
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
            <div class="card-footer d-flex justify-content-end">
                {{ $livres->links() }}
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>

<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card shadow-sm border-light">
            <div class="card-header bg-turquoise text-white d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                <h3 class="card-title flex-grow-1 mb-2 mb-sm-0"><i class="fa fa-list fa-2x"></i> Liste des livres</h3>
                <div class="card-tools d-flex flex-column flex-sm-row align-items-start align-items-sm-center mt-2 mt-sm-0">
                    <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center">
                        <div class="mb-2 mb-sm-0 mr-sm-2">
                            <a class="btn btn-light text-dark" wire:click.prevent="goToAddAuteur()" style="min-width: 200px;">
                                <i class="fas fa-plus-circle"></i> Nouveau livre
                            </a>
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
            <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
                <table class="table table-head-fixed">
                    <thead>
                        <tr>
                            <th style="width: 5%;">Photo</th>
                            <th style="width: 25%;">Nom</th>
                            <th style="width: 20%;" class="text-center">Ajouté</th>
                            <th style="width: 30%;" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($auteurs as $auteur)
                        <tr>
                            <td>
                                @if($auteur->sexe == "F")
                                    <img src="{{ asset('images/femme.png') }}" width="24" />
                                @else
                                    <img src="{{ asset('images/homme.png') }}" width="24" />
                                @endif
                            </td>
                            <td>{{ $auteur->prenom }} {{ $auteur->nom }}</td>
                            <td class="text-center">{{ optional($auteur->created_at)->diffForHumans() }}</td>
                            <td class="text-center">
                                <button class=" btn btn-outline-primary btn-sm" wire:click="goToEditAuteur({{ $auteur->id }})"> <i class="far fa-edit"></i> </button>
                                {{-- <button class="btn btn-link" wire:click="confirmDelete('{{ $auteur->prenom }} {{ $auteur->nom }}', {{ $auteur->id }})"> <i class="far fa-trash-alt"></i> </button> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="float-right">
                    {{ $auteurs->links() }}
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>

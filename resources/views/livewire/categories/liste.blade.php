<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i> Liste des catégories</h3>
                <div class="card-tools d-flex align-items-center">
                    <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToAddCategorie()"><i class="fas fa-plus"></i> Nouvelle catégorie</a>
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" name="table_search" wire:model.debounce.250ms="search" class="form-control float-right" placeholder="Rechercher une catégorie">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
                <table class="table table-head-fixed">
                    <thead>
                        <tr>
                          
                            <th style="width:40%;">Nom de la catégorie</th>
                            <th style="width:20%;" class="text-center">Ajouté</th>
                            <th style="width:30%;" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $categorie)
                        <tr>
                            
                            <td>-- {{ $categorie->nom }}</td>
                            <td class="text-center">{{ optional($categorie->created_at)->diffForHumans() }}</td>
                            <td class="text-center">
                                <button class="btn btn-link" wire:click="goToEditCategorie({{ $categorie->id }})"> <i class="far fa-edit"></i> </button>
                                <button class="btn btn-link" wire:click="confirmDelete('{{ $categorie->nom}}', {{ $categorie->id }})"> <i class="far fa-trash-alt"></i> </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="float-right">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>

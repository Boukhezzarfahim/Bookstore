<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1 text-white">
                    <i class="fas fa-percent fa-2x"></i> Liste des réductions
                </h3>
                <div class="card-tools d-flex align-items-center">
                    <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToAddReduction()">
                        <i class="fas fa-plus-circle"></i> Nouvelle réduction
                    </a>
                  
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
                <table class="table table-head-fixed">
                    <thead>
                        <tr>
                            <th style="width:40%;"><i class="fas fa-percentage"></i> Pourcentage de la réduction</th>
                            <th style="width:20%;" class="text-center"><i class="fas fa-calendar-alt"></i> Ajouté</th>
                            <th style="width:30%;" class="text-center"><i class="fas fa-tools"></i> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reductions as $reduction)
                        <tr>
                            <td>
                                <span class="badge badge-pill badge-success">{{ $reduction->reduction }} %</span>
                            </td>
                            <td class="text-center">{{ optional($reduction->created_at)->diffForHumans() }}</td>
                            <td class="text-center">
                                <button class="btn btn-link text-primary" wire:click="goToEditReduction({{ $reduction->id }})">
                                    <i class="far fa-edit"></i>
                                </button>
                                <button class="btn btn-link text-danger" wire:click="confirmDelete('{{ $reduction->reduction }}', {{ $reduction->id }})">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="float-right">
                    {{ $reductions->links() }}
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>

<?php

namespace App\Http\Livewire;

use App\Models\Reduction;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class ReductionComp extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;
    public $newReduction = [];
    public $editReduction = [];

    public function render()
    {
        Carbon::setLocale("fr");

        $reductionQuery = Reduction::query();

        return view('livewire.reductions.index', [
            "reductions" => $reductionQuery->latest()->paginate(5)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {
            return [
                'editReduction.reduction' => 'required|numeric|min:0|max:100',
            ];
        }
    
        return [
            'newReduction.reduction' => 'required|numeric|min:0|max:100',
        ];
    }
    

    public function goToAddReduction()
    {
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditReduction($id)
    {
        $this->editReduction = Reduction::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;
    }

    public function goToListReduction()
    {
        $this->currentPage = PAGELIST;
        $this->editReduction = [];
    }

    public function addReduction()
    {
    // Vérifier que les informations envoyées par le formulaire sont correctes
    $validationAttributes = $this->validate();

    // Ajouter une nouvelle réduction
    Reduction::create($validationAttributes["newReduction"]);

    $this->newReduction = [];

    $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Réduction créée avec succès!"]);
    }


    public function updateReduction()
    {
        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();

        // Mise à jour de l'auteur
        Reduction::find($this->editReduction["id"])->update($validationAttributes["editReduction"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Réduction mis à jour avec succès!"]);
    }

    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des réductions. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "reduction_id" => $id
            ]
        ]]);
    }

    public function deleteReduction($id)
    {
        Reduction::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Auteur supprimé avec succès!"]);
    }
}
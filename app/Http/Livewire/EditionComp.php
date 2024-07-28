<?php

namespace App\Http\Livewire;

use App\Models\Editeur;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class EditionComp extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;
    public $search = "";
    public $newEdition = [];
    public $editEdition = [];

    public function render()
    {
        Carbon::setLocale("fr");

        $editionQuery = Editeur::query();

        if ($this->search != "") {
            $this->resetPage();
            $editionQuery->where("nom_edition", "LIKE", "%" . $this->search . "%");                 
        }
        return view('livewire.admin.edition.index', [
            "editeurs" => $editionQuery->latest()->paginate(10)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {
            return [
                'editEdition.nom_edition' => 'required',
              
            ];
        }

        return [
            'newEdition.nom_edition' => 'required',
        ];
    }

    public function goToAddEdition()
    {
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditEdition($id)
    {
        $this->editEdition = Editeur::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;
    }

    public function goToListEdition()
    {
        $this->currentPage = PAGELIST;
        $this->editEdition = [];
    }

    public function addEdition()
    {
        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();

        // Ajouter un nouvelle edition
        Editeur::create($validationAttributes["newEdition"]);

        $this->newEdition = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Auteur créé avec succès!"]);
    }

    public function updateEdition()
    {
        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();

        // Mise à jour de l'edition
        Editeur::find($this->editEdition["id"])->update($validationAttributes["editEdition"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Auteur mis à jour avec succès!"]);
    }

    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des auteurs. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "auteur_id" => $id
            ]
        ]]);
    }

    public function deleteEdition($id)
    {
        Editeur::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Auteur supprimé avec succès!"]);
    }
}

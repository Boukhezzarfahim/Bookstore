<?php

namespace App\Http\Livewire;

use App\Models\Categorie;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class CategorieComp extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;
    public $search = "";
    public $newCategorie = [];
    public $editCategorie = [];

    public function render()
    {
        Carbon::setLocale("fr");

        $categorieQuery = Categorie::query();

        if ($this->search != "") {
            $this->resetPage();
            $categorieQuery->where("nom", "LIKE", "%" . $this->search . "%");                 
        }
        return view('livewire.categories.index', [
            "categories" => $categorieQuery->latest()->paginate(4)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {
            return [
                'editCategorie.nom' => 'required',
              
            ];
        }

        return [
            'newCategorie.nom' => 'required',
        ];
    }

    public function goToAddCategorie()
    {
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditCategorie($id)
    {
        $this->editCategorie = Categorie::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;
    }

    public function goToListCategorie()
    {
        $this->currentPage = PAGELIST;
        $this->editCategorie = [];
    }

    public function addCategorie()
    {
        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();

        // Ajouter un nouvelle edition
        Categorie::create($validationAttributes["newCategorie"]);

        $this->newCategorie = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Auteur créé avec succès!"]);
    }

    public function updateCategorie()
    {
        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();

        // Mise à jour de l'edition
        Categorie::find($this->editCategorie["id"])->update($validationAttributes["editCategorie"]);

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

    public function deleteCategorie($id)
    {
        Categorie::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Auteur supprimé avec succès!"]);
    }
}

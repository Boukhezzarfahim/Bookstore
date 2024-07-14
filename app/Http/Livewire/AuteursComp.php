<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Auteur;
use Livewire\Component;
use Livewire\WithPagination;

class AuteursComp extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;
    public $search = "";
    public $newAuteur = [];
    public $editAuteur = [];

    public function render()
    {
        Carbon::setLocale("fr");

        $auteurQuery = Auteur::query();

        if ($this->search != "") {
            $this->resetPage();
            $auteurQuery->where("nom", "LIKE", "%" . $this->search . "%")
                       ->orWhere("prenom", "LIKE", "%" . $this->search . "%");
        }
        return view('livewire.auteurs.index', [
            "auteurs" => $auteurQuery->latest()->paginate(10)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {
            return [
                'editAuteur.nom' => 'required',
                'editAuteur.prenom' => 'required',
                'editAuteur.sexe' => 'required|in:H,F',
            ];
        }

        return [
            'newAuteur.nom' => 'required',
            'newAuteur.prenom' => 'required',
            'newAuteur.sexe' => 'required|in:H,F',
        ];
    }

    public function goToAddAuteur()
    {
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditAuteur($id)
    {
        $this->editAuteur = Auteur::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;
    }

    public function goToListAuteur()
    {
        $this->currentPage = PAGELIST;
        $this->editAuteur = [];
    }

    public function addAuteur()
    {
        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();

        // Ajouter un nouvel auteur
        Auteur::create($validationAttributes["newAuteur"]);

        $this->newAuteur = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Auteur créé avec succès!"]);
    }

    public function updateAuteur()
    {
        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();

        // Mise à jour de l'auteur
        Auteur::find($this->editAuteur["id"])->update($validationAttributes["editAuteur"]);

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

    public function deleteAuteur($id)
    {
        Auteur::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Auteur supprimé avec succès!"]);
    }
}
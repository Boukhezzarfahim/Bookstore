<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Commande;
use Livewire\WithPagination;
use App\Models\LigneCommande;

class GestionCommande extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search = "";
    public $currentPage = PAGELIST;
    public $selectedCommande;
    public $filtreStatut = '';  

    public function render()
    {
        $commandeQuery = Commande::query();
    
        // Filtrage par recherche
        if ($this->search != "") {
            $this->resetPage();
            $commandeQuery->where("nom", "LIKE", "%" . $this->search . "%")
                         ->orWhere("prenom", "LIKE", "%" . $this->search . "%")
                         ->orWhere("email", "LIKE", "%" . $this->search . "%");
        }
    
        // Filtrage par statut
        if ($this->filtreStatut != "") {
            $commandeQuery->where("statut", $this->filtreStatut);
        }
    
        $commandes = $commandeQuery->latest()->paginate(10);
    
        return view('livewire.admin.commandes.index', [
            "commandes" => $commandes
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }
    

    public function goToCommandeDetails($id)
    {
        
        $this->selectedCommande = Commande::with('lignesCommande.livre')->find($id);
        $this->currentPage = PAGEDETAILS;
    }

    public function goBack()
    {
        $this->currentPage = PAGELIST;
        $this->selectedCommande = null;
    }



    public function approveCommande($id)
    {
        $commande = Commande::find($id);
        $commande->statut = 'Approuvée';
        $commande->save();

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Commande approuvée avec succès!"]);
    }

    public function cancelCommande($id)
    {
        $commande = Commande::find($id);
        $commande->statut = 'Annulée';
        $commande->save();

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Commande annulée avec succès!"]);
    }

    public function confirmDelete($id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer cette commande. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "commande_id" => $id
            ]
        ]]);
    }

    public function deleteCommande($id)
    {
        Commande::destroy($id);
        LigneCommande::where('commande_id', $id)->delete();

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Commande supprimée avec succès!"]);
    }

    public function toggleCommandeDetails($id)
    {
        $commandes = $this->commandes();
        foreach ($commandes as $commande) {
            if ($commande->id == $id) {
                $commande->showDetails = !$commande->showDetails;
                break;
            }
        }
    }

    private function commandes()
    {
        $commandeQuery = Commande::query();

        if ($this->search != "") {
            $this->resetPage();
            $commandeQuery->where("nom", "LIKE", "%" . $this->search . "%")
                         ->orWhere("prenom", "LIKE", "%" . $this->search . "%")
                         ->orWhere("email", "LIKE", "%" . $this->search . "%");
        }

        $commandes = $commandeQuery->latest()->paginate(10);

        foreach ($commandes as $commande) {
            $commande->showDetails = false;
            $commande->lignesCommande = $commande->lignesCommande;
        }

        return $commandes;
    }
}

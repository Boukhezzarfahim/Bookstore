<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactComp extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search = "";
    public $currentPage = PAGELIST;
    public $selectedContact;
    public $filtreContact = '';  

    public function render()
    {
        $contactQuery = Contact::query();
    
        // Filtrage par recherche
        if ($this->search != "") {
            $this->resetPage();
            $contactQuery->where("nom", "LIKE", "%" . $this->search . "%")
                         ->orWhere("prenom", "LIKE", "%" . $this->search . "%")
                         ->orWhere("email", "LIKE", "%" . $this->search . "%");
        }
    
        // Filtrage par contact
        if ($this->filtreContact != "") {
            $contactQuery->where("nom", $this->filtreContact);
        }
    
        $contacts = $contactQuery->latest()->paginate(10);
    
        return view('livewire.contacts.index', [
            "contacts" => $contacts
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function goToContactDetails($id)
    {
        $this->selectedContact = Contact::find($id);
        $this->currentPage = PAGEDETAILS;
    }

    public function goBack()
    {
        $this->currentPage = PAGELIST;
        $this->selectedContact = null;
    }

    public function confirmDelete($id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer ce contact. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "contact_id" => $id
            ]
        ]]);
    }

    public function deleteContact($id)
    {
        Contact::destroy($id);
        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Contact supprimé avec succès!"]);
    }
}

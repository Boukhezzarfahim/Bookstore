<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Livre;
use App\Models\Auteur;
use App\Models\Editeur;
use Livewire\Component;
use App\Models\Categorie;
use App\Models\Reduction;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class Livres extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = "bootstrap";
    public $currentPage = PAGELIST;
    public $search = "";
    public $filtreCategorie = "", $filtreDisponibilite = "";
    public $addLivre = [];
    public $editLivre = [];
    public $auteurs = [];
    public $editeurs = [];
    public $categories = [];
    public $reductions = [];
    public $addPhoto = null;
    public $editPhoto = null;
    public $inputFileIterator = 0;
    public $inputEditFileIterator = 0;
    public $editHasChanged;
    public $editLivreOldValues = [];
    public $image;

    public function mount()
    {
        $this->auteurs = Auteur::orderBy('nom', 'ASC')->get();
        $this->editeurs = Editeur::orderBy('nom_edition', 'ASC')->get();
        $this->categories = Categorie::orderBy('nom', 'ASC')->get();
        $this->reductions = Reduction::orderBy('reduction', 'ASC')->get();
    }

    protected function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {
            return [
                'editLivre.titre' => 'required',
                'editLivre.image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
                'editLivre.auteur_id' => 'required|exists:auteurs,id',
                'editLivre.ISBN' => ['required', 'unique:livres,ISBN,' . $this->editLivre['id']],
                'editLivre.edition_id' => 'required|exists:editeurs,id',
                'editLivre.categorie_id' => 'required|exists:categories,id',
                'editLivre.reduction_id' => 'nullable|exists:reductions,id', // Nullable
                'editLivre.genre' => 'required',
                'editLivre.prix' => 'required|numeric',
                'editLivre.ancien_prix' => 'nullable|numeric',
                'editLivre.disponibilite' => 'required|in:disponible,non disponible',
                'editLivre.nouveau' => 'nullable|boolean',
                'editLivre.date_publication' => 'required|date',
                'editLivre.description' => 'required',
            ];
        }
    }

    public function render()
    {
        Carbon::setLocale("fr");

        $livreQuery = Livre::query();

        if ($this->search != "") {
            $this->resetPage();
            $livreQuery->where("titre", "LIKE", "%" . $this->search . "%")
                       ->orWhere("ISBN", "LIKE", "%" . $this->search . "%");
        }

        if ($this->filtreCategorie != "") {
            $livreQuery->where("categorie_id", $this->filtreCategorie);
        }

        if ($this->filtreDisponibilite != "") {
            $livreQuery->where("disponibilite", $this->filtreDisponibilite);
        }

        return view('livewire.admin.livres.index', [
            'livres' => $livreQuery->latest()->paginate(4),
        ])->extends("layouts.master")->section("contenu");
    }

    public function goToAddUser()
    {
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditLivre($id)
    {
        $livre = Livre::find($id);
        if ($livre) {
            $this->editLivre = $livre->toArray();
            $this->image = null; // Reset image upload
            $this->currentPage = PAGEEDITFORM;
        }
    }

    public function goToListLivre()
    {
        $this->currentPage = PAGELIST;
        $this->editLivre = [];
    }
    public function ajoutLivre()
    {
        $validateArr = [
            "addLivre.titre" => "string|min:3|required|unique:livres,titre",
            "addLivre.ISBN" => "string|max:50|min:3|required|unique:livres,ISBN",
            "addLivre.auteur_id" => "required|exists:App\Models\Auteur,id",
            "addLivre.edition_id" => "required|exists:App\Models\Editeur,id",
            "addLivre.categorie_id" => "required|exists:App\Models\Categorie,id",
            "addLivre.reduction_id" => "nullable|exists:App\Models\Reduction,id",
            "addLivre.genre" => "required",
            "addLivre.prix" => "required|numeric",
            "addLivre.ancien_prix" => "nullable|numeric",
            "addLivre.disponibilite" => ["required", Rule::in(['disponible', 'non disponible'])],
            "addLivre.nouveau" => "required|boolean",
            "addLivre.date_publication" => "required|date",
            "addLivre.description" => "required|string",
            "addPhoto" => "image|max:10240" // 10mb
        ];
    
        $validatedData = $this->validate($validateArr);
    
        // Par défaut notre image est une placeholder
        $imagePath = "images/imageplaceholder.png";
    
        if ($this->addPhoto != null) {
            $path = $this->addPhoto->store('upload', 'public');
            $imagePath = "storage/" . $path;
    
            // $image = Image::make(public_path($imagePath))->fit(200, 200);
            // $image->save();
        }
    
        // Assigner NULL à reduction_id si la valeur est vide
        if (empty($validatedData['addLivre']['reduction_id'])) {
            $validatedData['addLivre']['reduction_id'] = null;
        }
    
        Livre::create([
            "titre" => $validatedData["addLivre"]["titre"],
            "ISBN" => $validatedData["addLivre"]["ISBN"],
            "auteur_id" => $validatedData["addLivre"]["auteur_id"],
            "edition_id" => $validatedData["addLivre"]["edition_id"],
            "genre" => $validatedData["addLivre"]["genre"],
            "prix" => $validatedData["addLivre"]["prix"],
            "ancien_prix" => $validatedData["addLivre"]["ancien_prix"],
            "disponibilite" => $validatedData["addLivre"]["disponibilite"],
            "nouveau" => $validatedData["addLivre"]["nouveau"],
            "date_publication" => $validatedData["addLivre"]["date_publication"],
            "description" => $validatedData["addLivre"]["description"],
            "categorie_id" => $validatedData["addLivre"]["categorie_id"],
            "reduction_id" => $validatedData["addLivre"]["reduction_id"],
            "image" => $imagePath
        ]);
    
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Livre ajouté avec succès!"]);
    }
    

    public function updateLivre()
    {
        $validateArr = [
            "editLivre.titre" => "string|min:3|required|unique:livres,titre," . $this->editLivre['id'],
            "editLivre.ISBN" => "string|max:50|min:3|required|unique:livres,ISBN," . $this->editLivre['id'],
            "editLivre.auteur_id" => "required|exists:App\Models\Auteur,id",
            "editLivre.edition_id" => "required|exists:App\Models\Editeur,id",
            "editLivre.categorie_id" => "nullable|exists:App\Models\Categorie,id",
            "editLivre.reduction_id" => "nullable|exists:App\Models\Reduction,id",
            "editLivre.genre" => "required",
            "editLivre.prix" => "required|numeric",
            "editLivre.ancien_prix" => "nullable|numeric",
            "editLivre.disponibilite" => ["required", Rule::in(['disponible', 'non disponible'])],
            "editLivre.nouveau" => "required|boolean",
            "editLivre.date_publication" => "required|date",
            "editLivre.description" => "required|string",
            "image" => "nullable|image|max:10240" // 10mb
        ];
    
        $validatedData = $this->validate($validateArr);
    
        $livre = Livre::find($this->editLivre['id']);
    
        if ($this->image) {
            // Supprimer l'ancienne image si elle existe
            if ($livre->image && $livre->image !== "images/imageplaceholder.png") {
                Storage::disk('public')->delete($livre->image);
            }
    
            // Enregistrer la nouvelle image
            $path = $this->image->store('upload', 'public');
            $validatedData['editLivre']['image'] = "storage/" . $path;
        } else {
            // Conserver l'ancienne image
            $validatedData['editLivre']['image'] = $livre->image;
        }
    
        // Assigner NULL à reduction_id si la valeur est vide
        if (empty($validatedData['editLivre']['reduction_id'])) {
            $validatedData['editLivre']['reduction_id'] = null;
        }
    
        $livre->update($validatedData['editLivre']);
    
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Livre mis à jour avec succès!"]);
    }
    

    public function confirmDelete($titre, $id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", [
            "message" => [
                "text" => "Vous êtes sur le point de supprimer $titre de la liste. Voulez-vous continuer?",
                "title" => "Êtes-vous sûr de continuer?",
                "type" => "warning",
                "data" => [
                    "livre_id" => $id
                ]
            ]
        ]);
    }

    public function deleteLivre($id)
    {
        $livre = Livre::find($id);

        if ($livre->image && $livre->image !== "images/imageplaceholder.png") {
            Storage::disk("public")->delete($livre->image);
        }

        $livre->delete();

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Livre supprimé avec succès!"]);
    }
}

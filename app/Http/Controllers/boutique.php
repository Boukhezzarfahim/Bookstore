<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Contact;
use App\Models\Categorie;
use Illuminate\Http\Request;

class boutique extends Controller
{


  // app/Http/Controllers/boutique.php
  public function index()
{
    // Récupère tous les livres
    $livres = Livre::all();

    return view('client.homeBooks', compact('livres'));
}


public function bookDetail($id)
{
    // Récupère le livre par ID
    $livre = Livre::findOrFail($id);

    return view('client.book-detail', compact('livre'));
}



public function bookFilter(Request $request)
{
    $query = Livre::query();

    // Filtrer par catégorie
    if ($request->has('categories')) {
        $categories = $request->input('categories');
        $query->whereHas('categorie', function($q) use ($categories) {
            $q->whereIn('nom', $categories);
        });
    }

    $livres = $query->with('categorie')->paginate(8); // Livres filtrés pour la première section
    $categories = Categorie::all(); // Récupérer toutes les catégories

    // Récupérer les livres en solde
    $livresOnSale = Livre::whereHas('reduction', function($q) {
        $q->where('reduction', '>', 0);
    })->get();

    return view('client.book-filter', compact('livres', 'categories', 'livresOnSale'));
}





public function service()
{
    return view('client.service');
}

public function contact()
{
    return view('client.contact');
}


public function contactStore(Request $request)
{
    // Validation des données
    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'telephone' => 'required|string|max:20',
        'message' => 'required|string',
    ]);

    // Création d'un nouvel enregistrement de contact
    Contact::create([
        'nom' => $request->input('nom'),
        'prenom' => $request->input('prenom'),
        'email' => $request->input('email'),
        'telephone' => $request->input('telephone'),
        'message' => $request->input('message'),
    ]);

    // Réponse JSON pour indiquer que la soumission a réussi
    return response()->json(['success' => true]);
}




}





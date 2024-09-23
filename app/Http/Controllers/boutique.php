<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Contact;
use App\Models\Commande;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\LigneCommande;
use Illuminate\Support\Facades\Session;


class boutique extends Controller
{

    public function index()
    {
        // Récupère tous les livres
        $livres = Livre::all();

        // Compte les articles dans le panier
        $cart = Session::get('cart', []);
        $cartCount = array_sum(array_column($cart, 'quantity'));

        return view('client.homeBooks', compact('livres', 'cartCount'));
    }


    public function bookDetail($id)
    {
        // Récupère le livre par ID
        $livre = Livre::findOrFail($id);

        // Compte les articles dans le panier
        $cart = Session::get('cart', []);
        $cartCount = array_sum(array_column($cart, 'quantity'));

        return view('client.book-detail', compact('livre', 'cartCount'));
    }



    public function bookFilter(Request $request)
    {
        $query = Livre::query();

        // Filtrer par catégorie
        if ($request->has('categories')) {
            $categories = $request->input('categories');
            $query->whereHas('categorie', function ($q) use ($categories) {
                $q->whereIn('nom', $categories);
            });
        }

        // Filtrer par recherche
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('titre', 'like', '%' . $searchTerm . '%');
        }

        $livres = $query->with('categorie')->paginate(8); // Livres filtrés
        $categories = Categorie::all(); // Récupérer toutes les catégories

        // Récupérer les livres en solde
        $livresOnSale = Livre::whereHas('reduction', function ($q) {
            $q->where('reduction', '>', 0);
        })->get();

        // Compte les articles dans le panier
        $cart = Session::get('cart', []);
        $cartCount = array_sum(array_column($cart, 'quantity'));

        return view('client.book-filter', compact('livres', 'categories', 'livresOnSale', 'cartCount'));
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

    public function contact()
    {
        $cart = Session::get('cart', []);
        $cartCount = array_sum(array_column($cart, 'quantity'));

        return view('client.contact', compact('cartCount'));
    }


    public function addToCart(Request $request, $id)
    {
        $livre = Livre::findOrFail($id);
        $quantity = $request->input('quantity', 1);
    
        $cart = Session::get('cart', []);
        $cart[$id] = [
            "livre_id" => $livre->id,
            "titre" => $livre->titre,
            "quantity" => isset($cart[$id]) ? $cart[$id]['quantity'] + $quantity : $quantity,
            "prix" => $livre->prix,
            "image" => $livre->image
        ];
    
        Session::put('cart', $cart);
    
        // Réponse JSON avec le nombre d'articles dans le panier
        $cartCount = array_sum(array_column($cart, 'quantity'));
        return response()->json(['success' => true, 'message' => 'Book added to cart successfully!', 'cartCount' => $cartCount]);
    }
    


    public function showCart()
    {
        $cartItems = Session::get('cart', []);

        $cartCount = array_sum(array_column($cartItems, 'quantity'));

        return view('client.cart-item', compact('cartItems', 'cartCount'));
    }

    public function updateCart(Request $request, $id)
    {
        $quantity = $request->input('quantity');

        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
            Session::put('cart', $cart);

            return response()->json([
                'success' => true,
                'total' => $cart[$id]['prix'] * $quantity
            ]);
        }

        return response()->json(['success' => false], 400);
    }
    public function removeFromCart($id)
{
    $cart = Session::get('cart', []);

    // Vérifiez si l'item existe dans le panier
    if (isset($cart[$id])) {
        unset($cart[$id]); // Supprimez l'item du panier
        Session::put('cart', $cart); // Mettez à jour le panier dans la session

        // Ajoutez un message de succès à la session
        Session::flash('success_message', 'Book removed from cart successfully!');
    }

    // Recompte des articles dans le panier
    $cartCount = array_sum(array_column($cart, 'quantity'));

    // Retourner une réponse JSON avec le nouveau nombre d'articles
    return view('client.cart-item', ['success' => true, 'cartCount' => $cartCount]);
}

    

    public function checkout()
    {
        $cartItems = Session::get('cart', []);
        $cartCount = array_sum(array_column($cartItems, 'quantity'));
        $subtotal = array_reduce($cartItems, function ($carry, $item) {
            return $carry + ($item['prix'] * $item['quantity']);
        }, 0);

        return view('client.checkout', compact('cartItems', 'cartCount', 'subtotal'));
    }
    
   public function processCheckout(Request $request)
{
    // Validation des données
    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'message' => 'nullable|string',
        'ville' => 'required|string|max:255',
        'wilaya' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'telephone' => 'required|string|max:20',
        'code_postale' => 'required|string|max:10',
    ]);

    // Créer la commande
    $commande = Commande::create([
        'nom' => $request->input('nom'),
        'prenom' => $request->input('prenom'),
        'message' => $request->input('message'),
        'ville' => $request->input('ville'),
        'wilaya' => $request->input('wilaya'),
        'email' => $request->input('email'),
        'telephone' => $request->input('telephone'),
        'code-postale' => $request->input('code_postale'),
        'date_commande' => now(),
        'montant_total' => 0, // Ce champ sera mis à jour plus tard
        'statut' => 'En attente',
    ]);

    $cartItems = Session::get('cart', []);
    $totalAmount = 0;

    // Créer les lignes de commande
    foreach ($cartItems as $item) {
        $totalAmount += $item['prix'] * $item['quantity'];
        LigneCommande::create([
            'commande_id' => $commande->id,
            'livre_id' => $item['livre_id'],
            'quantite' => $item['quantity'],
            'prix_unitaire' => $item['prix'],
        ]);
    }

    // Mettre à jour le montant total de la commande
    $commande->update(['montant_total' => $totalAmount]);

    // Vider le panier
    Session::forget('cart');

    // Redirection avec un message
    return redirect()->route('client.book-filter')->with('success_message', 'Votre commande a été passée avec succès !');
}

    

    public function service()
    {
        return view('client.service');
    }
}

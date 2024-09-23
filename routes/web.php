<?php

use App\Http\Livewire\Livres;
use App\Http\Controllers\boutique;
use App\Http\Livewire\AuteursComp;
use App\Http\Livewire\ContactComp;
use App\Http\Livewire\EditionComp;
use App\Http\Livewire\CategorieComp;
use App\Http\Livewire\ReductionComp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\GestionCommande;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/', [boutique::class, 'index'])->name('homeBooks');
Route::get('/livre/{id}', [boutique::class, 'bookDetail'])->name('client.book-detail');
Route::get('/service', [boutique::class, 'service'])->name('service');
Route::get('/contact', [boutique::class, 'contact'])->name('client.contact');
Route::post('/contact', [boutique::class, 'contactStore'])->name('contact.submit');
Route::get('/book-filter', [boutique::class, 'bookFilter'])->name('client.book-filter');
Route::post('/add-to-cart/{id}', [boutique::class, 'addToCart'])->name('add.to.cart');
Route::post('/remove-from-cart/{id}',  [boutique::class,'removeFromCart'])->name('remove.from.cart');
Route::get('/cart-items', [boutique::class, 'showCart'])->name('client.cart-item');
Route::post('/update-cart/{id}', [boutique::class, 'updateCart'])->name('update.cart');
Route::get('/checkout', [boutique::class, 'checkout'])->name('client.checkout');
Route::post('/checkout', [boutique::class, 'processCheckout'])->name('checkout.process');







Auth::routes(['register' => false]);


Route::group([
    "middleware" => ["auth", "auth.admin"],
    'as' => 'admin.'
], function(){

    Route::group([
        "prefix" => "Livres&catégories",
        'as' => 'Livres&catégories.'
    ], function(){

        Route::get("/livre", Livres::class)->name("article.index");
        Route::get("/catégorie", CategorieComp::class)->name("categorie.index");
        Route::get("/reduction", ReductionComp::class)->name("reduction.index");


    });

    Route::group([
        "prefix" => "Auteurs&edition",
        'as' => 'Auteurs&edition.'
    ], function(){

        Route::get("/auteur", AuteursComp::class)->name("auteur.index");
        Route::get("/edition", EditionComp::class)->name("edition.index");

    });
    Route::group([
        "prefix" => "Commandes",
        'as' => 'Commandes.'
    ], function(){

        Route::get("/commande", GestionCommande::class)->name("commande.index");

    });
    Route::group([
        "prefix" => "Contacts",
        'as' => 'Contacts.'
    ], function(){

        Route::get("/contact", ContactComp::class)->name("contact.index");

    });
});


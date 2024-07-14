<?php

use App\Http\Livewire\Livres;
use App\Http\Livewire\AuteursComp;
use App\Http\Livewire\ContactComp;
use App\Http\Livewire\EditionComp;
use App\Http\Livewire\CategorieComp;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

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


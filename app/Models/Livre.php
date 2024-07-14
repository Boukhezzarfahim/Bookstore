<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livre extends Model
{
    use HasFactory;

    protected $table = 'livres';

    protected $fillable = [
        'titre',
        'image',
        'auteur_id',
        'ISBN',
        'edition_id', // Changement de "editeur" à "edition_id"
        'genre',
        'prix',
        'ancien_prix',
        'reduction_id',
        'disponibilite',
        'nouveau',
        'date_publication',
        'description',
        'categorie_id', // Ajout de "categorie_id"
    ];

    public function auteur()
    {
        return $this->belongsTo(Auteur::class);
    }

    public function edition() // Changement de "editeur" à "edition"
    {
        return $this->belongsTo(Editeur::class);
    }

    public function lignesCommande()
    {
        return $this->hasMany(LigneCommande::class);
    }

    public function categorie() // Nouvelle méthode pour la catégorie
    {
        return $this->belongsTo(Categorie::class);
    }
    
    public function reduction()
    {
        return $this->belongsTo(reduction::class);
    }
}
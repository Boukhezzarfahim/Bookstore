<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;
    
    protected $table = 'commandes';

    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'telephone',
        'email',
        'date_commande',
        'montant_total',
        'statut',
    ];

   public function getMontantTotalAttribute()
    {
        // Calcul du montant total en multipliant la quantité par le prix unitaire
        return $this->lignesCommande->sum(function ($ligne) {
            return $ligne->quantite * $ligne->prix_unitaire;
        });
    }


    public function lignesCommande()
    {
        return $this->hasMany(LigneCommande::class);
    }
}

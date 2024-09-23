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
        'message',
        'telephone',
        'email',
        'wilaya',
        'ville',
        'code-postale',
        'date_commande',
        'montant_total',
        'statut',
    ];

    public function lignesCommande()
    {
        return $this->hasMany(LigneCommande::class);
    }

    public function getMontantTotalAttribute()
    {
        return $this->lignesCommande->sum(function ($ligne) {
            return $ligne->quantite * $ligne->prix_unitaire;
        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LigneCommande extends Model
{
    use HasFactory;

    protected $table = 'lignes_commande';

    protected $fillable = [
        'commande_id',
        'livre_id',
        'quantite',
        'prix_unitaire',
    ];

    // public static function boot()
    // {
    //     parent::boot();

    //     static::saved(function ($ligne) {
    //         $commande = $ligne->commande;
    //         $commande->updateMontantTotal();
    //     });

    //     static::deleted(function ($ligne) {
    //         $commande = $ligne->commande;
    //         $commande->updateMontantTotal();
    //     });
    // }

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    public function livre()
    {
        return $this->belongsTo(Livre::class);
    }
}

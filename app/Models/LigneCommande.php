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

 

    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    public function livre()
    {
        return $this->belongsTo(Livre::class);
    }
}

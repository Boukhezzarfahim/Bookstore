<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auteur extends Model
{
    use HasFactory;

    protected $table = 'auteurs';

    protected $fillable = [
        'nom',
        'prenom',
        'sexe'
    ];

    public function livres()
    {
        return $this->hasMany(Livre::class);
    }
}

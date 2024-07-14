<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Editeur extends Model
{
    use HasFactory;

    protected $table = 'editeurs';

    protected $fillable = [
        'nom_edition', // Changement de "nom" à "nom_edition"
    ];

    public function livres()
    {
        return $this->hasMany(Livre::class);
    }
}

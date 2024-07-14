<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    
    protected $table = 'categories';

    protected $fillable = [
        'nom',
    ];

    public function livres()
    {
        return $this->hasMany(Livre::class);
    }
}

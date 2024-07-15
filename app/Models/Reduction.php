<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reduction extends Model
{
    use HasFactory;
    
    protected $table = 'reductions';

    protected $fillable = [

        'reduction',
        
    ];

    public function livres()
    {
        return $this->hasMany(Livre::class);
    }
}

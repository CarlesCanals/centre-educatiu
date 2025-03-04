<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumne extends Model
{
    protected $table = 'alumne';

    protected $fillable = [
        'nom',
        'cognom',
        'data_naixement',
        'nif',
        'classe_id'
    ];

    // Relació: Cada alumne pertany a una classe
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }
}

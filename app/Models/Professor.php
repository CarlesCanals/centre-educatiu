<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = 'professor';

    protected $fillable = [
        'nom',
        'cognom',
        'data_naixement',
        'nif',
        'classe_id'
    ];
}

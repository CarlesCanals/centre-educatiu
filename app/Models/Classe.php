<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Professor;

class Classe extends Model
{
    protected $table = 'classe';

    protected $fillable = [
        'grup',
        'tutor_id'
    ];

    // Relació: Una classe té un tutor (professor)
    public function tutor()
    {
        return $this->belongsTo(Professor::class, 'tutor_id');
    }
}

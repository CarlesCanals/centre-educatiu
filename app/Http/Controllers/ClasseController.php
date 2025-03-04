<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;

class ClasseController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'grup'  => 'required|string|max:255',
            'tutor' => 'nullable|exists:professor,id'
        ]);

        $classe = Classe::create($validated);

        return response()->json([
            'message' => 'Classe creada correctament',
            'data'    => $classe
        ], 201);
    }
}

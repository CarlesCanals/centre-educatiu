<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Professor;

class ProfessorController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom'           => 'required|string|max:255',
            'cognom'        => 'required|string|max:255',
            'data_naixement'=> 'required|date',
            'nif'           => 'required|string|unique:professor,nif',
            'classe_id'     => 'nullable|exists:classe,id'
        ]);

        $professor = Professor::create($validated);

        return response()->json([
            'message' => 'Professor registrat correctament',
            'data'    => $professor
        ], 201);
    }
}

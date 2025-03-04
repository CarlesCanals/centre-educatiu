<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumne;

class AlumneController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom'           => 'required|string|max:255',
            'cognom'        => 'required|string|max:255',
            'data_naixement'=> 'required|date',
            'nif'           => 'required|string|unique:alumne,nif',
            'classe_id'     => 'nullable|exists:classe,id'
        ]);

        $alumne = Alumne::create($validated);

        return response()->json([
            'message' => 'Alumne afegit correctament',
            'data'    => $alumne
        ], 201);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumne;

class PrivateController extends Controller
{
    // Assegura't d'afegir el middleware per protegir aquests endpoints
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    // Endpoint privat 1: Afegir un alumne
    public function afegirAlumne(Request $request)
    {
        // Validació de les dades rebudes
        $validated = $request->validate([
            'nom'           => 'required|string|max:255',
            'cognom'        => 'required|string|max:255',
            'data_naixement'=> 'required|date',
            'nif'           => 'required|string|unique:alumne,nif',
            'classe_id'     => 'nullable|exists:classe,id'
        ]);

        // Creació de l'alumne
        $alumne = Alumne::create($validated);

        return response()->json([
            'message' => 'Alumne afegit correctament',
            'data'    => $alumne
        ], 201);
    }

    // Endpoint privat 2: Afegir una aula (classe) amb tutor
    public function afegirAula(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'tutor_id' => 'required|integer'
        ]);

        // Aquí hauries d'afegir la lògica per crear l'aula i assignar el tutor i alumnes
        return response()->json(['message' => 'Aula creada correctament', 'data' => $request->all()]);
    }
}

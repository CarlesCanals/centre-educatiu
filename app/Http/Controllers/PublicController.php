<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumne;
use App\Models\Classe;

class PublicController extends Controller
{
    /**
     * Retorna la llista d'alumnes amb informació completa.
     */
    public function alumnes()
    {
        // Carrega els alumnes amb la seva classe i el tutor associat a la classe
        $alumnes = Alumne::with('classe.tutor')->get();

        // Transforma cada alumne per mostrar el nom complet i la informació relacionada
        $data = $alumnes->map(function ($alumne) {
            return [
                'id'             => $alumne->id,
                'nom_complet'    => $alumne->nom . ' ' . $alumne->cognom,
                'data_naixement' => $alumne->data_naixement,
                'nif'            => $alumne->nif,
                'classe'         => $alumne->classe ? [
                    'id'    => $alumne->classe->id,
                    'grup'  => $alumne->classe->grup,
                    'tutor' => $alumne->classe->tutor 
                        ? $alumne->classe->tutor->nom . ' ' . $alumne->classe->tutor->cognom 
                        : null,
                ] : null,
            ];
        });

        return response()->json($data);
    }

    /**
     * Retorna la llista de classes amb el nom del tutor.
     */
    public function aules()
    {
        $aules = Classe::with('tutor')->get()->map(function ($classe) {
            return [
                'id'    => $classe->id,
                'grup'  => $classe->grup,
                'tutor' => $classe->tutor 
                            ? $classe->tutor->nom . ' ' . $classe->tutor->cognom 
                            : null,
            ];
        });

        return response()->json($aules);
    }
}

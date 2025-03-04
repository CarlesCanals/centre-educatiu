<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PrivateController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\AlumneController;
use App\Http\Controllers\ClasseController;
use Illuminate\Support\Facades\Route;

// Autenticació
// Eliminar o comentar el registre públic:
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Endpoints públics (per a consultes, per exemple)
Route::get('/alumnes', [PublicController::class, 'alumnes']);
Route::get('/aules', [PublicController::class, 'aules']);

// Endpoints privats per inserció (accesibles per administradors)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/afegir-professor', [ProfessorController::class, 'store']);
    Route::post('/afegir-alumne', [AlumneController::class, 'store']);
    Route::post('/afegir-classe', [ClasseController::class, 'store']);
});

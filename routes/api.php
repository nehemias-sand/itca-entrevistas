<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\CatalogoPreguntasController;
use App\Http\Controllers\CicloController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EntrevistaController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\PreguntaController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::middleware('jwt')->post('logout', [AuthController::class, 'logout']);
});

Route::middleware('jwt')->prefix('user')
    ->group(function () {
        Route::get('', [AuthController::class, 'getUser']);
        Route::post('change-password', [AuthController::class, 'changePassword']);
    });

Route::middleware('jwt', 'check.profile:ADMIN,DOCENTE')
    ->group(function () {
        Route::get('/ciclo', [CicloController::class, 'index']);
        Route::get('/ciclo/{id}', [CicloController::class, 'show']);
    });

Route::middleware('jwt', 'check.profile:ADMIN')->prefix('admin')
    ->group(function () {
        // Usuarios
        Route::post('/user/register', [AuthController::class, 'registerAdmin']);
        
        // Ciclos
        Route::post('/ciclo', [CicloController::class, 'store']);
        Route::put('/ciclo/{id}', [CicloController::class, 'update']);
        Route::delete('/ciclo/{id}', [CicloController::class, 'delete']);

        // Carreras
        Route::get('/carrera', [CarreraController::class, 'index']);
        Route::get('/carrera/{id}', [CarreraController::class, 'show']);
        Route::post('/carrera', [CarreraController::class, 'store']);
        Route::put('/carrera/{id}', [CarreraController::class, 'update']);
        Route::delete('/carrera/{id}', [CarreraController::class, 'delete']);

        // Preguntas
        Route::get('/pregunta', [PreguntaController::class, 'index']);
        Route::get('/pregunta/{id}', [PreguntaController::class, 'show']);
        Route::post('/pregunta', [PreguntaController::class, 'store']);
        Route::put('/pregunta/{id}', [PreguntaController::class, 'update']);
        Route::delete('/pregunta/{id}', [PreguntaController::class, 'delete']);

        // Catalogos
        Route::get('/catalogo', [CatalogoPreguntasController::class, 'index']);
        Route::get('/catalogo/{id}', [CatalogoPreguntasController::class, 'show']);
        Route::post('/catalogo', [CatalogoPreguntasController::class, 'store']);
        Route::put('/catalogo/{id}', [CatalogoPreguntasController::class, 'update']);
        Route::delete('/catalogo/{id}', [CatalogoPreguntasController::class, 'delete']);

        //Docente
        Route::get('/docente', [DocenteController::class, 'index']);
        Route::get('/docente/{id}', [DocenteController::class, 'show']);
        Route::post('/docente/register', [DocenteController::class, 'register']);
        Route::put('/docente/{id}', [DocenteController::class, 'update']);
        Route::delete('/docente/{id}', [DocenteController::class, 'delete']);

        //Estudiante
        Route::post('/estudiante/register', [EstudianteController::class, 'store']);
    });

Route::middleware('jwt', 'check.profile:DOCENTE')->prefix('docente')
    ->group(function () {
        //Entrevista
        Route::post('/entrevista/register', [EntrevistaController::class, 'register']);
    });

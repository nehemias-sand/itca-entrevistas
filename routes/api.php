<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\CatalogoController;
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

Route::middleware('jwt')->prefix('user')->group(function () {
    Route::get('', [AuthController::class, 'getUser']);
    Route::post('change-password', [AuthController::class, 'changePassword']);
});

Route::middleware('jwt', 'check.profile:ADMIN,DOCENTE')->group(function () {
    Route::get('/ciclo', [CicloController::class, 'index']);
    Route::get('/ciclo/{id}', [CicloController::class, 'show']);
    Route::get('/estudiante', [EstudianteController::class, 'index']);
    Route::get('/estudiante/{id}', [EstudianteController::class, 'show']);
    Route::get('/entrevista/resultados', [EntrevistaController::class, 'index']);
    Route::get('/entrevista/export', [EntrevistaController::class, 'exportEntrevistas']);
});

Route::middleware('jwt', 'check.profile:ADMIN')->prefix('admin')->group(function () {
    // Catalogos
    Route::get('/catalogo/perfil', [CatalogoController::class, 'indexPerfiles']);
    Route::get('/catalogo/cargo', [CatalogoController::class, 'indexCargos']);
    Route::get('/catalogo/facultad', [CatalogoController::class, 'indexFacultades']);
    Route::get('/catalogo/jornada', [CatalogoController::class, 'indexJornadas']);
    Route::get('/catalogo/modalidad', [CatalogoController::class, 'indexModalidades']);
    Route::get('/catalogo/regional', [CatalogoController::class, 'indexRegionales']);
    Route::get('/catalogo/tipo-respuesta', [CatalogoController::class, 'indexTiposRespuesta']);

    // Usuarios
    Route::get('/user', [AuthController::class, 'index']);
    Route::post('/user/register', [AuthController::class, 'registerAdmin']);
    Route::put('/user/{id}', [AuthController::class, 'update']);
    Route::put('/user/change-estado/{id}', [AuthController::class, 'changeEstado']);

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

    // Catalogo Preguntas
    Route::get('/catalogo-preguntas', [CatalogoPreguntasController::class, 'index']);
    Route::get('/catalogo-preguntas/{id}', [CatalogoPreguntasController::class, 'show']);
    Route::post('/catalogo-preguntas', [CatalogoPreguntasController::class, 'store']);
    Route::put('/catalogo-preguntas/{id}', [CatalogoPreguntasController::class, 'update']);
    Route::delete('/catalogo-preguntas/{id}', [CatalogoPreguntasController::class, 'delete']);

    //Docente
    Route::get('/docente', [DocenteController::class, 'index']);
    Route::get('/docente/{id}', [DocenteController::class, 'show']);
    Route::post('/docente/register', [DocenteController::class, 'register']);
    Route::put('/docente/{id}', [DocenteController::class, 'update']);
    Route::delete('/docente/{id}', [DocenteController::class, 'delete']);

    //Estudiante
    Route::post('/estudiante/register', [EstudianteController::class, 'store']);
    Route::post('/estudiante/import', [EstudianteController::class, 'importarCSV']);
    Route::put('/estudiante/{id}', [EstudianteController::class, 'update']);
    Route::delete('/estudiante/{id}', [EstudianteController::class, 'delete']);
});

Route::middleware('jwt', 'check.profile:DOCENTE')->prefix('docente')->group(function () {
    //Entrevista
    Route::post('/entrevista', [EntrevistaController::class, 'register']);
});

<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\Docente\CreateDocenteRequest;
use App\Http\Requests\Docente\UpdateDocenteRequest;
use App\Http\Resources\DocenteResource;
use App\Mail\WelcomeMail;
use App\Services\AuthService;
use Illuminate\Support\Facades\Mail;
use App\Services\DocenteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocenteController extends Controller
{
    public function __construct(
        private DocenteService $docenteService
    ){}

    public function index(Request $request) 
    {
        $pagination = array_merge([
            'paginate' => 'true',
            'per_page' => 10
        ], $request->only(['paginate', 'per_page']));

        $filter = $request->only(['nombres_or_apellidos', 'id_cargo']);

        $data = $this->docenteService->index($pagination, $filter);

        return ApiResponseClass::sendResponse(DocenteResource::collection($data));
    }

    public function show($id)
    {
        $docente = $this->docenteService->show($id);
        if (!$docente) return ApiResponseClass::sendResponse(new DocenteResource($docente));
    }

    public function register(CreateDocenteRequest $request)
    {
        $docenteData = $request->only([
            'carnet',
            'nombres',
            'apellidos',
            'email',
            'id_cargo',
            'id_facultad'
        ]);

        $nombres = explode(' ', $request['nombres']);
        $username = strtolower($nombres[0] . '.' . ($nombres[1] ?? ''));

        $password = AuthService::generatePassword();

        $userData = [
            'username' => $username,
            'email' => $docenteData['email'],
            'password' => $password,
            'id_perfil' => 2 // Docente
        ];

        DB::beginTransaction();

        try {
            $user = $this->docenteService->createUserForDocente($userData);

            $docenteData['id_usuario'] = $user->id;

            $docente = $this->docenteService->store($docenteData);

            Mail::to($userData['email'])
                ->send(new WelcomeMail(
                    $userData
                ));
            DB::commit();

            return ApiResponseClass::sendResponse(compact('user'), null, 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    public function update($id, UpdateDocenteRequest $request) {

        $docenteData = $request->only([
            'carnet',
            'nombres',
            'apellidos',
            'email',
            'id_cargo',
            'id_facultad'
        ]);

        $docente = $this->docenteService->update($id, $docenteData);
        if (!$docente) return ApiResponseClass::sendResponse(null, "Docente con ID $id no encontrado", 404);

        $userId = $docente->id_usuario;

        $userData = [];

        if(isset($docenteData['nombres'])) {
            $nombres = explode(' ', $request['nombres']);
            $userData['username'] = strtolower($nombres[0] . '.' . ($nombres[1] ?? ''));
        }

        if(isset($docenteData['email'])) {
            $userData['email'] = $docenteData['email'];
        }

        if(!empty($userData)) {
            $userUpdated = $this->docenteService->updateUserForDocente($userId, $userData);
            if (!$userUpdated) {
                return ApiResponseClass::sendResponse(null, "Usuario con ID $userId no encontrado", 404);
            } 
        }

        return ApiResponseClass::sendResponse(new DocenteResource($docente));
    }

    public function delete($id) {
        $docente = $this->docenteService->delete($id);
        if (!$docente) return ApiResponseClass::sendResponse(null, "Docente con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new DocenteResource($docente));
    }
}

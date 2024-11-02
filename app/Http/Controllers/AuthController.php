<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Mail\WelcomeMail;
use App\Services\AuthService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct(
        private AuthService $authService
    ) {}

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return ApiResponseClass::sendResponse(null, 'Invalid credentials', 401);
            }

            $user = auth()->user();

            return ApiResponseClass::sendResponse(compact('user', 'token'));
        } catch (JWTException $e) {
            return ApiResponseClass::sendResponse(null, 'Could not create token', 500);
        }
    }

    public function registerAdmin(RegisterRequest $request)
    {
        $username = $request->username;
        $email = $request->email;
        $password = AuthService::generatePassword();

        $data = [
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'id_perfil' => 1 // Administrador
        ];

        DB::beginTransaction();

        try {
            $user = $this->authService->register($data);
            $token = JWTAuth::fromUser($user);

            Mail::to($data['email'])
                ->send(new WelcomeMail(
                    $data
                ));

            DB::commit();
            return ApiResponseClass::sendResponse(compact('user', 'token'), null, 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    public function getUser()
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return ApiResponseClass::sendResponse(null, 'User not found', 404);
            }
        } catch (JWTException $e) {
            return ApiResponseClass::sendResponse(null, 'Invalid token', 400);
        }

        return ApiResponseClass::sendResponse(compact('user'));
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = auth()->user();
    
        DB::beginTransaction();

        try {
            $user = $this->authService->updatePassword($user->id, $request->new_password);

            DB::commit();
            return ApiResponseClass::sendResponse(compact('user'));
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return ApiResponseClass::sendResponse(null, 'Successfully logged out');
    }
}

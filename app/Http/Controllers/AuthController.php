<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterMemberRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct(
        private AuthService $authService
    )
    { }

    public function login(LoginRequest $request) 
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return ApiResponseClass::sendResponse(null, 'Invalid credentials', 401);
            }

            $sessionUser = auth()->user();

            $user = [
                'id' => $sessionUser->id,
                'username' => $sessionUser->username,
                'email' => $sessionUser->email,
                'email_verified_at' => $sessionUser->email_verified_at,
                'profile' => $sessionUser->profile->name,
                'state' => $sessionUser->state,
            ];

            return ApiResponseClass::sendResponse(compact('user', 'token'));
            
        } catch(JWTException $e) {
            return ApiResponseClass::sendResponse(null, 'Could not create token', 500);
        }
    }

    public function register(RegisterRequest $request)
    {
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        $profile_id = $request->profile_id;

        $data = [
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'profile_id' => $profile_id,
        ];

        DB::beginTransaction();

        try {
            $user = $this->authService->register($data);

            DB::commit();
            return ApiResponseClass::sendResponse(new UserResource($user), null, 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    public function registerMember(RegisterMemberRequest $request)
    {
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;

        $data = [
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'profile_id' => 2,
        ];

        DB::beginTransaction();

        try {
            $user = $this->authService->register($data);

            DB::commit();
            return ApiResponseClass::sendResponse(new UserResource($user), null, 201);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    public function index(Request $request)
    {
        $pagination = array_merge([
            'paginate' => 'true',
            'per_page' => 10
        ], $request->only(['paginate', 'per_page']));

        $filter = $request->only(['email']);

        $data = $this->authService->index($pagination, $filter);
        return ApiResponseClass::sendResponse(UserResource::collection($data));
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

    public function update($id, UpdateUserRequest $request)
    {
        $data = $request->only([
            'username',
            'email',
        ]);

        $user = $this->authService->update($id, $data);
        if (!$user) return ApiResponseClass::sendResponse(null, "Usuario con ID $id no encontrado", 404);

        return ApiResponseClass::sendResponse(new UserResource($user));
    }

    public function changeState($id)
    {
        $userUpdated = $this->authService->changeState($id);
        if (!$userUpdated) {
            return ApiResponseClass::sendResponse(null, "Usuario con ID $id no encontrado", 404);
        }

        $message = $userUpdated->activo ? 'Usuario activado exitosamente' : 'Usuario desactivado exitosamente';
        return ApiResponseClass::sendResponse(null, $message);
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return ApiResponseClass::sendResponse(null, 'Successfully logged out');
    }
}

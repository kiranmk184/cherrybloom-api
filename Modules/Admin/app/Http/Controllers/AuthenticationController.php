<?php

namespace Modules\Admin\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Modules\Admin\Models\Admin;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Http\Requests\LoginRequest;
use Modules\Core\Http\Controllers\BaseController;

class AuthenticationController extends BaseController
{
    public function login(LoginRequest $loginRequest): JsonResponse
    {
        try {
            $credentials = $loginRequest->validated();
            $admin = Admin::where([
                'email' => $credentials['email'],
            ])->first();

            if (!$admin || !Hash::check($credentials['password'], $admin->password)) {
                throw new Exception('Invalid credentials');
            }

            $token = $admin->createToken("admin")->plainTextToken;
        } catch (Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Login successful',
            'payload' => [
                'access_token' => $token,
                'user' => $admin
            ]
        ]);
    }

    public function logout(Request $request)
    {
        return response()->json('logout here');
    }
}

<?php

namespace App\Modules\Users\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\{
    Request,
    JsonResponse
};

use App\Modules\Users\Http\Requests\Auth\{
    UserLoginRequest
};

use App\Modules\Users\Services\{
    AuthService
};

class AuthController extends Controller
{
    /**
     * @param LoginOwnerRequest $request
     * @return JsonResponse
     */
    public function login(UserLoginRequest $request): JsonResponse
    {
        $loginResult = AuthService::login([
            'email'     => $request->email, 
            'password'  => $request->password
        ]);

        return response()->json(
            $loginResult['data'],
            $loginResult['code']
        );
    }

    /**
     * Get logged user
     * 
     * @return JsonResponse
     */
    public function me(): JsonResponse
    {
        $user = AuthService::me();

        return response()->json([
            'user' => $user
        ]);
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        AuthService::logout();

        return response()->json([
            'message' => 'User logged out.'
        ]);
    }

    /**
     * Refresh token
     *
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        $refreshResult = AuthService::refresh();

        return response()->json(
            $refreshResult['data'],
            $refreshResult['code']
        );
    }
}

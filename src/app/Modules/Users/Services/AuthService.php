<?php

namespace App\Modules\Users\Services;

use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Modules\Users\Resources\UserMeResource;

/**
 * Class AuthService
 * @package App\Modules\Users\Services
 */
class AuthService
{
    /**
     * Login user
     * 
     * @param array $credentials
     * @return array
     */
    public static function login($credentials): array
    {

        if (!self::guard()->attempt($credentials)) {
            return [
                'data' => [
                    'message' => 'Incorrect email or password.',
                ],
                'code' => 401,
            ];
        }

        $user = self::guard()->user();

        try {
            $token = JWTAuth::fromUser($user);
        } catch (JWTException $e) {
            return [
                'data' => [
                    'error' => $e->getMessage(),
                ],
                'code' => 500,
            ];
        }

        return [
            'data' => [
                'token'         => $token,
                'token_type'    => 'bearer',
                'expires_in'    => JWTAuth::factory()->getTTL(),
                'user'          => new UserMeResource($user)
            ],
            'code' => 200,
        ];
    }

    /**
     * Loguot user
     *
     * @return void
     */
    public static function logout()
    {
        return self::guard()->logout();
    }

    /**
     * Refresh token
     *
     * @return array
     */
    public static function refresh(): array
    {
        $token = self::guard()->refresh();

        return [
            'data' => [
                'token'      => $token,
                'token_type' => 'bearer',
                'expires_in' => JWTAuth::factory()->getTTL(),                
            ],
            'code' => 200,
        ];
    }

    /**
     * Get current user
     * 
     * @return array
     */
    public static function me()
    {
        $user = self::guard()->user();

        return new UserMeResource($user);
    }

    /**
     * Undocumented function
     *
     * @param string $provider
     * @return void
     */
    private static function guard(string $provider = 'api')
    {
        return Auth::guard($provider);
    }

}

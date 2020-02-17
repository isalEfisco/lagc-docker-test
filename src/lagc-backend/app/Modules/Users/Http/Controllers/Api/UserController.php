<?php

namespace App\Modules\Users\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\{
    Request,
    JsonResponse
};

use App\Modules\Users\Http\Requests\Users\{
    CheckTokenRequest,
    ConfirmEmailRequest
};

use App\Modules\Users\Services\{
    UserService
};

class UserController extends Controller
{  
    /**
     * Services instances
     */
    private $userService;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->userService = new UserService();
    }

    /**
     * Check confirm email token existiong
     *
     * @param CheckTokenRequest $request
     * @return JsonResponse
     */
    public function checkToken(CheckTokenRequest $request): JsonResponse
    {
        return response()->json([
            'massage' => 'Valid token'
        ]);
    }

    /**
     * Set password
     *
     * @param ConfirmEmailRequest $request
     * @return JsonResponse
     */
    public function setPassword(ConfirmEmailRequest $request): JsonResponse
    {
        $this->userService->setPassword(
            $request->token,
            $request->password
        );

        return response()->json([
            'massage' => 'Password setted'
        ]);
    }
}

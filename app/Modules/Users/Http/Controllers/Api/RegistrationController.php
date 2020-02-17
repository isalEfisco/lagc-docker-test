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
    RegistrationService
};

class RegistrationController extends Controller
{
    /**
     * Services instances
     */
    private $registrationService;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->registrationService = new RegistrationService();
    }

    /**
     * Check confirm email token existiong
     *
     * @param CheckTokenRequest $request
     * @return JsonResponse
     */
    public function checkInvitationToken(CheckTokenRequest $request): JsonResponse
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
    public function confirmEmail(ConfirmEmailRequest $request): JsonResponse
    {
        $this->registrationService->setPassword(
            $request->token,
            $request->password
        );

        return response()->json([
            'massage' => 'Password setted'
        ]);
    }
}

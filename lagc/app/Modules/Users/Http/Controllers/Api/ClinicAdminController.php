<?php

namespace App\Modules\Users\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\{
    Request,
    JsonResponse
};

use App\Modules\Users\Http\Requests\ClinicAdmin\{
    CreateClinicAdminRequest,
    UpdateClinicAdminRequest
};

use App\Http\Modules\Users\Resources\{
    UserMeResource
};

use App\Modules\Users\Services\{
    ClinicAdminService
};

class ClinicAdminController extends Controller
{
    /**
     * Services instances
     */
    private $clinicAdminService;

    /**
     * ClinicAdminController constructor.
     */
    public function __construct()
    {
        $this->clinicAdminService = new ClinicAdminService();
    }

    /**
     * @param CreateClinicAdminRequest $request
     * @return UserMeResource
     */
    public function create(CreateClinicAdminRequest $request): UserMeResource
    {
        $clinicAdmin = $this->clinicAdminService->createClinicAdmin(
            $request->clinic_id,
            $request->only(
                'name',
                'email'
            )
        );

        return new UserMeResource($clinicAdmin);
    }

    /**
     * @param UpdateClinicAdminRequest $request
     * @return UserMeResource
     */
    public function update(UpdateClinicAdminRequest $request): UserMeResource
    {
        $clinicAdmin = $this->clinicAdminService->updateClinicAdmin(
            $request->id,
            $request->only(
                'name',
                'email'
            )
        );

        return new UserMeResource($clinicAdmin);
    }

}

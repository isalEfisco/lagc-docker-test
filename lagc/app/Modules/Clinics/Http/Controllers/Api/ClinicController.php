<?php

namespace App\Modules\Clinics\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\{
    Request,
    JsonResponse
};

use App\Modules\Clinics\Http\Requests\Clinics\{
    ClinicIdRequest,
    CreateClinicRequest,
    UpdateClinicRequest
};

use App\Modules\Clinics\Http\Resources\Clinics\{
    ClinicAdminResource,
    ClinicResource
};

use App\Modules\Clinics\Services\ClinicService;

class ClinicController extends Controller
{
    /**
     * Services instances
     */
    private $clinicService;

    /**
     * ClinicController constructor.
     */
    public function __construct()
    {
        $this->clinicService = new ClinicService();
    }

    /**
     * @param ClinicIdRequest $request
     * @return ClinicResource
     */
    public function get(ClinicIdRequest $request): ClinicResource
    {
        $clinic = $this->clinicService->getClinicWithAttributes(
            $request->clinic_id
        );

        return new ClinicResource($clinic);
    }

    /**
     * Get paginated clinics
     *
     * @return void
     */
    public function list()
    {
        $clinics = $this->clinicService->getActivePaginatedClinics();

        return ClinicResource::collection($clinics);
    }

    public function getAdmins(ClinicIdRequest $request)
    {
        $clinicWithAdmins = $this->clinicService->getClinicWithAttributes(
            $request->clinic_id,
            [
                'admins'
            ]
        );

        return ClinicAdminResource::collection($clinicWithAdmins->admins);
    }

    /**
     * @param CreateClinicRequest $request
     * @return ClinicResource
     */
    public function create(CreateClinicRequest $request): ClinicResource
    {
        $clinic = $this->clinicService->create(
            $request->only(
                'name',
                'phone',
                'address',
                'insured_patients_percent',
                'uninsured_patients_percent',
                'size',
                'ownership'
            )
        );

        return new ClinicResource($clinic);
    }

    /**
     * @param UpdateClinicRequest $request
     * @return ClinicResource
     */
    public function update(UpdateClinicRequest $request): ClinicResource
    {
        $clinic = $this->clinicService->update(
            $request->clinic_id,
            $request->only(
                'name',
                'phone',
                'address',
                'insured_patients_percent',
                'uninsured_patients_percent',
                'size',
                'ownership',
                'active'
            )
        );

        return new ClinicResource($clinic);
    }
}

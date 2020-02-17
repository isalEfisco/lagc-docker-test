<?php

namespace App\Modules\Clinics\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\{
    Request,
    JsonResponse
};

use App\Modules\Clinics\Http\Requests\Clinics\{
    ClinicIdRequest
};

use App\Modules\Clinics\Http\Requests\Doctors\{
    CreateDoctorRequest,
    DoctorIdRequest,
    UpdateDoctorRequest
};

use App\Modules\Clinics\Http\Resources\Doctors\{
    DoctorResource
};

use App\Modules\Clinics\Services\DoctorService;

class DoctorContoller extends Controller
{
    /**
     * Services instances
     */
    private $doctorService;

    /**
     * DoctorContoller constructor.
     */
    public function __construct()
    {
        $this->doctorService = new DoctorService();
    }

    /**
     * @param DoctorIdRequest $request
     * @return ClinicResource
     */
    public function get(DoctorIdRequest $request): DoctorResource
    {
        $doctor = $this->doctorService->getDoctorWithAttributes(
            $request->id
        );

        return new DoctorResource($doctor);
    }
    
    /**
     * @param ClinicIdRequest $request
     * @return AnonymousResourceCollection
     */
    public function getDoctorsByClinic(ClinicIdRequest $request): AnonymousResourceCollection
    {
        $doctors = $this->doctorService->getDoctorsByClinic(
            $request->id
        );

        return DoctorResource::collection($doctors);
    }

    /**
     * @param CreateDoctorRequest $request
     * @return DoctorResource
     */
    public function create(CreateDoctorRequest $request): DoctorResource
    {
        $doctor = $this->doctorService->create(
            $request->only(
                'clinic_id',
                'name', 
                'gender', 
                'credential',
                'field',
                'minority_status'
            )
        );

        return new DoctorResource($doctor);
    }

    /**
     * @param UpdateDoctorRequest $request
     * @return DoctorResource
     */
    public function update(UpdateDoctorRequest $request): DoctorResource
    {
        $doctor = $this->doctorService->update(
            $request->id,
            $request->only(
                'name', 
                'gender', 
                'credential',
                'field',
                'minority_status'
            )
        );

        return new DoctorResource($doctor);
    }

    /**
     * @param DoctorIdRequest $request
     * @return JsonResponse
     */
    public function delete(DoctorIdRequest $request): JsonResponse
    {
        $this->doctorService->delete(
            $request->id
        );

        return response()->json([], 204);
    }
}

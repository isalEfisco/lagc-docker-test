<?php

namespace App\Modules\Clinics\Services;

use App\Modules\Clinics\Models\Doctor;

class DoctorService
{

    /**
     * Get doctor with loaded attributes
     *
     * @param integer $id
     * @param null|array $attributes
     * @return Doctor
     */
    public function getDoctorWithAttributes(int $id, ?array $attributes = null): Doctor
    {
        $doctor = Doctor::find($id);

        if(!is_null($attributes)){
            $doctor->load(
                $attributes
            );
        }

        return $doctor;
    }

    /**
     * @param integer $clinicId
     * @return void
     */
    public function getDoctorsByClinic(int $clinicId)
    {
        return Doctor::where('clinic_id', $clinicId)
            ->paginate(10);
    }

    /**
     * @param array $data
     * @return Doctor
     */
    public function create(array $data): Doctor
    {
        return Doctor::create($data);
    }

    /**
     * @param integer $id
     * @param array $data
     * @return Doctor
     */
    public function update(int $id, array $data): Doctor
    {
        return tap(Doctor::findOrFail($id))->update($data);
    }

    /**
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool
    {
        return Doctor::find($id)->delete();
    }

}

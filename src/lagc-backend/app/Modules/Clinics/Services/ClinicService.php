<?php

namespace App\Modules\Clinics\Services;

use App\Modules\Clinics\Models\Clinic;

class ClinicService
{

    /**
     * Get clinic with loaded attributes
     *
     * @param integer $id
     * @param null|array $attributes
     * @return Clinic
     */
    public function getClinicWithAttributes(int $id, ?array $attributes = null): Clinic
    {
        $clinic = Clinic::find($id);

        if(!is_null($attributes)){
            $clinic->load(
                $attributes
            );
        }

        return $clinic;
    }

    /**
     * 
     *
     */
    public function getActivePaginatedClinics()
    {
        return Clinic::where('active', true)
            ->paginate(10);
    }

    /**
     * @param array $data
     * @return Clinic
     */
    public function create(array $data): Clinic
    {
        return Clinic::create($data);
    }

    /**
     * @param integer $id
     * @param array $data
     * @return Clinic
     */
    public function update(int $id, array $data): Clinic
    {
        return tap(Clinic::findOrFail($id))->update($data);
    }

}

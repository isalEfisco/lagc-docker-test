<?php

namespace App\Modules\Clinics\Http\Resources\Clinics;

use Illuminate\Http\Resources\Json\JsonResource;

class ClinicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'    => $this->id,
            'name'  => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'insured_patients_percent' => $this->insured_patients_percent,
            'uninsured_patients_percent' => $this->uninsured_patients_percent,
            'size' => $this->size,
            'ownership' => $this->ownership
        ];
    }
}

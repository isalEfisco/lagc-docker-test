<?php

namespace App\Modules\Clinics\Http\Resources\Doctors;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Modules\Clinics\Enum\{
    DoctorCredentialsEnum,
    DoctorFieldsEnum
};

class DoctorResource extends JsonResource
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
            'gender' => $this->gender,
            'credential' => DoctorCredentialsEnum::CREDENTIALS[$this->credential],
            'field' => DoctorFieldsEnum::FIELDS[$this->field],
            'minority_status' => $this->minority_status
        ];
    }
}

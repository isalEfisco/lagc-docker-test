<?php

namespace App\Modules\Clinics\Http\Requests\Doctors;

use Illuminate\Foundation\Http\FormRequest;

use App\Modules\Clinics\Enum\{
    DoctorCredentialsEnum,
    DoctorFieldsEnum
};

class UpdateDoctorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:doctors,id',
            'clinic_id' => 'required|exists:clinics,id',
            'name' => 'required|string|max:255',
            'gender' => 'required|in:m,f',
            'credential' => 'required|in:'.DoctorCredentialsEnum::getCredentialsKeysString(),
            'field' => 'required|in:'.DoctorFieldsEnum::getFieldsKeysString(),
            'minority_status' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function validationData()
    {
        return [
            'id' => $this->id,
            'clinic_id' => $this->clinic_id,
            'name' => $this->name,
            'gender' => $this->gender,
            'credential' => $this->credential,
            'field' => $this->field,
            'minority_status' => $this->minority_status,
        ];
    }
}

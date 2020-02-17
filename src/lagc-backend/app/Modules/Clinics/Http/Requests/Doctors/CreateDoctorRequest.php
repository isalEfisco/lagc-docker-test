<?php

namespace App\Modules\Clinics\Http\Requests\Doctors;

use Illuminate\Foundation\Http\FormRequest;

use App\Modules\Clinics\Enum\{
    DoctorCredentialsEnum,
    DoctorFieldsEnum
};

class CreateDoctorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'clinic_id' => 'required|exists:clinics,id',
            'name' => 'required|string|max:255',
            'gender' => 'required|in:m,f',
            'credential' => 'required|in:'.DoctorCredentialsEnum::getCredentialsKeysString(),
            'field' => 'required|in:'.DoctorFieldsEnum::getFieldsKeysString(),
            'minority_status' => 'required|string'
        ];
    }
}

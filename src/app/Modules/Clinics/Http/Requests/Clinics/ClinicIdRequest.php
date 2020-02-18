<?php

namespace App\Modules\Clinics\Http\Requests\Clinics;

use Illuminate\Foundation\Http\FormRequest;

class ClinicIdRequest extends FormRequest
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
        ];
    }

    /**
     * @return array
     */
    public function validationData()
    {
        return [
            'clinic_id' => $this->clinic_id,
        ];
    }
}

<?php

namespace App\Modules\Clinics\Http\Requests\Clinics;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClinicRequest extends FormRequest
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
            'phone' => 'required|max:13',
            'address' => 'required|string|max:255',
            'insured_patients_percent' => 'nullable|numeric',
            'uninsured_patients_percent' => 'nullable|numeric',
            'size' => 'nullable|integer',
            'ownership' => 'nullable|string',
            'active' => 'required|boolean'
        ];
    }

    /**
     * @return array
     */
    public function validationData()
    {
        return [
            'clinic_id' => $this->clinic_id,
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'insured_patients_percent' => $this->insured_patients_percent,
            'uninsured_patients_percent' => $this->uninsured_patients_percent,
            'size' => $this->size,
            'ownership' => $this->ownership,
            'active' => $this->active,
        ];
    }
}

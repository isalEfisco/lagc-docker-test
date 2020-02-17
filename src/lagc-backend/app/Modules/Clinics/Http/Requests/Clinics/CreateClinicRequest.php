<?php

namespace App\Modules\Clinics\Http\Requests\Clinics;

use Illuminate\Foundation\Http\FormRequest;

class CreateClinicRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|max:13',
            'address' => 'required|string|max:255',
            'insured_patients_percent' => 'nullable|numeric',
            'uninsured_patients_percent' => 'nullable|numeric',
            'size' => 'nullable|integer',
            'ownership' => 'nullable|string',
        ];
    }
}

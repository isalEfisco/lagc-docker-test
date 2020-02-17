<?php

namespace App\Modules\Clinics\Http\Requests\Doctors;

use Illuminate\Foundation\Http\FormRequest;

class DoctorIdRequest extends FormRequest
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
        ];
    }

    /**
     * @return array
     */
    public function validationData()
    {
        return [
            'id' => $this->id,
        ];
    }
}

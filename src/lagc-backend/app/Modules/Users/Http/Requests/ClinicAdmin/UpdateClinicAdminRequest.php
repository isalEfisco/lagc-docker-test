<?php

namespace App\Modules\Users\Http\Requests\ClinicAdmin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClinicAdminRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'    => 'required|exists:users,id',
            'name'  => 'required|string',
            'email' => 'required|email|unique:users,email_address,'.$this->id,
        ];
    }

    /**
     * @return array
     */
    public function validationData()
    {
        return [
            'id'    => $this->id,
            'name'  => $this->name,
            'email' => $this->email,
        ];
    }
}

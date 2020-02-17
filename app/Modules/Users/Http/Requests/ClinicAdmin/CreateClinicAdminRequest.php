<?php

namespace App\Modules\Users\Http\Requests\ClinicAdmin;

use Illuminate\Foundation\Http\FormRequest;

class CreateClinicAdminRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required|string',
            'email' => 'required|email|unique:users,email_address',
        ];
    }
}

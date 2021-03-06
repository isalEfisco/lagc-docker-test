<?php

namespace App\Modules\Users\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmEmailRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'token'     => 'required|exists:user_invitations,token',
            'password'  => 'required|min:8|max255|confirmed',
        ];
    }
}

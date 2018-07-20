<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|unique:users|email_active',
            'password' => 'required|string|between:4,40'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => '',
            'email.unique' => '',
            'email.email_active' => '',
            'password.required' => '',
            'password.string' => '',
            'password.between' => '',
        ];
    }
}

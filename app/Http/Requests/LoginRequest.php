<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email:filter',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'tên email được để trống',
            'email.filter' => 'tên email không đúng',
            'password.required' => 'password không được để trống ',
        ];
    }
}
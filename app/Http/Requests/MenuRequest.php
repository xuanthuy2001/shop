<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'parent_id' => 'required',
            'content' => 'required',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'thuộc tính :attribute không được để trống',
            'parent_id.required' => 'thuộc tính :attribute không được để trống',
            'content.required' => 'thuộc tính :attribute không được để trống',
            'description.required' => 'thuộc tính :attribute không được để trống',
        ];
    }
}
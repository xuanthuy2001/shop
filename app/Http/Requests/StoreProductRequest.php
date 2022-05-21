<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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


    public function rules()
    {
        return [
            'name' => 'required',
            'menu_id' => 'required',
            'content' => 'required',
            'description' => 'required',
            'thumb' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'thuộc tính :attribute không được để trống',
            'name.size' => 'trường  :attribute phải trên :min ký tự',
            'menu_id.required' => 'thuộc tính :attribute không được để trống',
            'content.required' => 'thuộc tính :attribute không được để trống',
            'description.required' => 'thuộc tính :attribute không được để trống',
            'thumb.required' => 'thuộc tính :attribute không được để trống',
        ];
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|unique:sliders',
            'url' => 'required',
            'thumb' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => ':attribute không được để trống',
            'name.unique' => 'tên slider đã tồn tại',
            'url.required' => 'đường dẫn phải nhập đầy đủ',
            'thumb.required' => 'cần thêm ảnh cho slider',
        ];
    }
}
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class MenuRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => [
                'required',
                'name' => Rule::unique('menus')->where(
                    function ($query) {
                        // kiểm tra nếu thẻ cha chưa có thì thêm vào 
                        // nếu thẻ cha có rồi thì kiểm tra trong thẻ con thuộc thẻ cha  đó đã tồn tại hay chưa 
                        return $query->where('parent_id',  $this->parent_id);
                    }
                )
            ],
            'parent_id' => 'required',
            'content' => 'required',
            'description' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'thuộc tính :attribute không được để trống',
            'name.unique' => 'thuộc tính :attribute đã tồn tại trong danh mục',
            'parent_id.required' => 'thuộc tính :attribute không được để trống',
            'content.required' => 'thuộc tính :attribute không được để trống',
            'description.required' => 'thuộc tính :attribute không được để trống',
        ];
    }
}
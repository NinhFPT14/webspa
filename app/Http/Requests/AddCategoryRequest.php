<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequest extends FormRequest
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
            'name' => 'required|unique:categories|max:255',
            'type' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' =>':attribute không được để trống',
            'unique' =>'attribute đã tồn tại',
            'max' =>':attribute không được vượt quá 255 ký tự',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên danh mục',
            'type' => 'Loại danh mục',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditCategoryRequest extends FormRequest
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
            'type' => 'required',
            'name' =>
                    [
                        'required','max:255',
                        Rule::unique('categories')->ignore($this->id,'id'),
                    ],
        ];
        
    }
    public function messages()
    {
        return [
            'required' =>':attribute không được để trống',
            'max' =>':attribute không được vượt quá 255 ký tự',
            'unique'=>':attribute đã được sử dụng'
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

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditLogoRequest extends FormRequest
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
            'image' => 'required|image|max:10000'
        ];
    }
        public function messages(){
            return [
                'required'=>':attribute không được để trống',
                'image'=>':attribute phải là ảnh',
                'max'=>':attribute ảnh không được vượt quá 10MB',
            ];
        }
    
        public function attributes(){
            return [
                'image' =>'Ảnh',
            ];
        }
}
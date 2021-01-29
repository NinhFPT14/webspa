<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditFooterRequest extends FormRequest
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
                'address' => 'required|max:255|min:5',
                'phone_number' => 'required|max:255|min:5',
                'email' => 'required|max:255|min:5|',
                'link_fanpage' => 'required|max:255|min:5|'
        ];
    }
    public function messages(){
        return [
            'required'=>':attribute không được để trống',
            'max'=>':attribute không được vượt quá :max',
            'min'=>':attribute ít nhất phải trên :min kí tự',
        ];
    }

    public function attributes(){
        return [
            'address' => '	Địa chỉ',
            'phone_number' =>'Số điện thoại',
            'Email' =>'Ảnh',
            'Link' =>'Link',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddFeedbackRequest extends FormRequest
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
            'name' => 'required|max:255',
            'phone_number' => 'required|digits_between:10,11',
            'content' => 'required|max:65535',
        ];
    }
    public function messages()
    {
        return [
            'required' =>':attribute không được để trống',
            'max' =>':attribute không được vượt quá 255 ký tự',
            'digits_between'=>':attribute phải là số và từ 10 đến 11 số',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên',
            'phone_number' => 'Số điện thoại',
            'content' => 'Nội dung',
        ];
    }
}

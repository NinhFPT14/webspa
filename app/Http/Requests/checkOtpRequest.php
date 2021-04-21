<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class checkOtpRequest extends FormRequest
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
            'code' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'required' =>':attribute không được để trống',
            'numeric' =>':attribute phải là số',
        ];
    }
    public function attributes()
    {
        return [
            'code' => 'Mã otp',
        ];
    }
}

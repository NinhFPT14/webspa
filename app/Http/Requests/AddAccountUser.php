<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAccountUser extends FormRequest
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
            'phone' => 'required|numeric|digits_between:10,11|unique:users,phone_number',
            'password' => 'required|min:8|max:12',
            'password_confirm' => 'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            'required' =>':attribute không được để trống',
            'digits_between'=>':attribute phải là 10 số',
            'min' =>':attribute không được nhỏ hơn :min ký tự',
            'max' =>':attribute không được vượt quá :max ký tự',
            'same'=>':attribute không đúng',
            'unique'=>':attribute đã tồn tại',
        ];
    }
    public function attributes()
    {
        return [
            'phone' => 'Số điện thoại',
            'password' => 'Mật khẩu',
            'password_confirm' => 'Xác nhận mật khẩu',
        ];
    }
}

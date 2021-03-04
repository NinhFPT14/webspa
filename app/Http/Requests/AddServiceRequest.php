<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddServiceRequest extends FormRequest
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
            'name' => 'required|max:255|unique:services',
            'time' => 'required|max:999',
            'price' => 'required|max:100',
            'description' => 'required|max:255',
            'detail' => 'required|max:255',
            'discount' => 'required|max:255',
        ];
    }

    public function messages(){
        return [
            'required'=>':attribute không được để trống',
            'max'=>':attribute không được vượt quá :max',
            'unique'=>':attribute đã được sử dụng',
            'digits_between'=>':attribute phải là số và từ 0 đến 999 số',
            'max' => ':attribute kích thước không được 255 ký tự',
            'image' => ':attribute phải là ảnh',
            'size' => ':attribute có độ dài lớn hơn 10 ký tự',
        ];
    }

    public function attributes(){
        return [
            'name' =>'Tên dịch vụ',
            'description' =>'Mô tả',
            'detail' =>'Chi tiết',
            'price' =>'Giá cũ',
            'discount' =>'Giá giảm',
            'time' => 'Thời gian làm'
        ];
    }
}

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
            'name' =>'required|max:255|unique:services',
            'image' => 'required',
            'time_working' => 'required|max:255|digits_between:0,9999999',
            'total_time' => 'required|max:255|digits_between:0,99',
            'price' => 'required||digits_between:0,9999999',
            'description' => 'required|max:65535',
            'detail' => 'required|max:65535',
            'discount' => 'required|max:255|digits_between:0,9999999|lt:price',
            'category_id' => 'required'
            
        ];
    }

    public function messages(){
        return [
            'required'=>':attribute không được để trống',
            'max'=>':attribute không được vượt quá :max',
            'unique'=>':attribute đã được sử dụng',
            'max' => ':attribute kích thước không được 1000 ký tự',
            'image' => ':attribute phải là ảnh',
            'size' => ':attribute có độ dài lớn hơn 10 ký tự',
            'time_working' => ':attribute không được vượt quá :max',
            'description' => ':attribute không vượt quá :max',
            'digits_between' => ':attribute phải lớn hơn 0',
            'lt' => ':attribute phải nhỏ giá cũ'

        ];
    }

    public function attributes(){
        return [
            'name' =>'Tên dịch vụ',
            'image' => 'Hình ảnh sản phẩm',
            'description' =>'Mô tả',
            'detail' =>'Chi tiết',
            'price' =>'Giá cũ',
            'discount' =>'Giá mới',
            'time_working' => 'Thời gian làm',
            'category_id' => 'Loại danh mục',
            'total_time' => 'Số buổi thực hiện'
        ];
    }
}

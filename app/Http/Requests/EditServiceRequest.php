<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditServiceRequest extends FormRequest
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
            'name' =>
            [
                'required','max:255',
                Rule::unique('services')->ignore($this->id,'id'),
                
            ],
            'image' => 'image|max:10000',
            'time_working' => 'required|max:255',
            'total_time' => 'required|max:255|digits_between:0,99',
            'price' => 'required|max:10000|digits_between:0,9999999',
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
            'max' => ':attribute kích thước không được 255 ký tự',
            'image' => ':attribute phải là ảnh',
            'size' => ':attribute có độ dài lớn hơn 10 ký tự',
            'time_working' => ':attribute không được vượt quá :max',
            'digits_between' => ':attribute phải lớn hơn 0',
            'lt' => 'Giá mới phải nhỏ hơn giá cũ'
        ];
    }

    public function attributes(){
        return [
            'name' =>'Tên dịch vụ',
            'image' => 'Hình ảnh',
            'description' =>'Mô tả',
            'detail' =>'Chi tiết',
            'price' =>'Giá cũ',
            'discount' =>'Giá giảm',
            'time_working' => 'Thời gian làm',
            'category_id' => 'Danh mục',
            'total_time' => 'Số buổi thực hiện'
        ];
    }
}

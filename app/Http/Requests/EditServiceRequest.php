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
            'name' => [
                'required','max:255',
                Rule::unique('services')->ignore($this->id,'id'),
            ],
            'time_working' => 'required|max:255',
            'price' => 'required|max:10000',
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
            'max' => ':attribute kích thước không được 255 ký tự',
            'image' => ':attribute phải là ảnh',
            'size' => ':attribute có độ dài lớn hơn 10 ký tự',
            'time_working' => ':attribute không được vượt quá :max',
            'price' => ''

        ];
    }

    public function attributes(){
        return [
            'name' =>'Tên dịch vụ',
            'description' =>'Mô tả',
            'detail' =>'Chi tiết',
            'price' =>'Giá cũ',
            'discount' =>'Giá giảm',
            'time_working' => 'Thời gian làm'
        ];
    }
}

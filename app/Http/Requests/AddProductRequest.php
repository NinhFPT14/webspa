<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
         'name' =>'required|max:255|unique:products',
         'category_id' =>'required',
         'description' =>'required|max:255',
         'detail' =>'required|max:65535',
         'price' =>'required|digits_between:4,11',
         'discount' =>'required|digits_between:4,11',
         'quality' =>'required|digits_between:4,11',
         'image' =>'required',
        ];
    }

    public function messages(){
        return [
            'required'=>':attribute không được để trống',
            'max'=>':attribute không được vượt quá :max',
            'unique'=>':attribute đã được sử dụng',
            'digits_between'=>':attribute phải là số và từ 4 đến 11 số',
        ];
    }

    public function attributes(){
        return [
            'category_id' => 'Danh mục',
            'name' =>'Tên sản phẩm',
            'description' =>'Mô tả',
            'detail' =>'Chi tiết',
            'price' =>'Giá cũ',
            'discount' =>'Giá giảm',
            'quality' =>'Số lượng',
            'image' =>'Ảnh',
        ];
    }
}

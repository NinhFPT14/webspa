<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditProductRequest extends FormRequest
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
                        Rule::unique('products')->ignore($this->id,'id'),
                    ],
         'category_id' =>'required',
         'description' =>'required|max:65535',
         'detail' =>'required|max:65535',
         'price' =>'required|digits_between:4,11',
         'discount' =>'required|lt:price',
         'quality' =>'required|digits_between:1,11',
         'image' =>'',
         'image.*' =>'image|max:10000',
         'avatar' =>'image|max:10000',
        ];
    }

    public function messages(){
        return [
            'required'=>':attribute không được để trống',
            'max'=>':attribute không được vượt quá :max',
            'unique'=>':attribute đã được sử dụng',
            'digits_between'=>':attribute phải là số và từ 4 đến 11 số',
            'max' => ':attribute kích thước không được vượt quá :max',
            'image' => ':attribute phải là ảnh',
            'lt'=>':attribute nhỏ hơn giá giá cũ',
        ];
    }

    public function attributes(){
        return [
            'category_id' => 'Danh mục',
            'title' =>'Tiêu đề bài viết',
            'description' =>'Mô tả ngắn',
            'detail' =>'Nội dung',
            'avatar' => 'Ảnh đại diện',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class EditBlog extends FormRequest
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
            'title' =>[
                'required','max:255',
                Rule::unique('posts')->ignore($this->id,'id'),
            ],
            'category_id' =>'required',
            'description' =>'required|max:65535',
            'detail' =>'required|max:65535',
            'avatar' =>'required|image|max:10000',
        ];
    }

    public function messages(){
        return [
            'required'=>':attribute không được để trống',
            'max'=>':attribute không được vượt quá :max',
            'unique'=>':attribute đã được sử dụng',
            'max' => ':attribute kích thước không được vượt quá :max',
            'image' => ':attribute phải là ảnh',
            'size' => ':attribute phải là 4 ảnh',
        ];
    }

    public function attributes(){
        return [
            'category_id' => 'Danh mục',
            'title' =>'Tiêu đề bài viết',
            'description' =>'Mô tả ngắn',
            'detail' =>'Nội dung bài viết',
            'avatar' => 'Ảnh đại diện',
        ];
    }

}

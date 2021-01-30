<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSlideRequest extends FormRequest
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
        'title' => 'required|max:250|min:5||unique:slides',
        'content' => 'required|max:255|min:5',
        'image' => 'required',
        'link' => 'required|max:255|min:5|',
        'status' => 'required'
        ];
    }
        public function messages(){
            return [
                'required'=>':attribute không được để trống',
                'max'=>':attribute không được vượt quá :max',
                'min'=>':attribute ít nhất phải trên :min kí tự',
                'unique'=>':attribute đã được sử dụng',
            ];
        }
    
        public function attributes(){
            return [
                'title' => 'Tiêu đề',
                'content' =>'Nội dung',
                'image' =>'Ảnh',
                'link' =>'Link',
                'status' =>'Trạng Thái',
            ];
        }
    }
    
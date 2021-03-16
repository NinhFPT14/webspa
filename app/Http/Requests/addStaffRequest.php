<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addStaffRequest extends FormRequest
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
            'name' => 'required|unique:staffs|max:255',
            'image' => 'required|image|max:10000',
            'status' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'required' =>':attribute không được để trống',
            'unique' =>':attribute đã tồn tại',
            'max' =>':attribute không được vượt quá :max ký tự',
            'image'=>':attribute phải là ảnh',
            'numeric'=>':attribute phải phải là số',
            
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên nhân viên',
            'image' => 'Ảnh',
            'status' => 'Trạng thái',
        ];
    }
}

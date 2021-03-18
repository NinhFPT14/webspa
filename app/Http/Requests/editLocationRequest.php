<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class editLocationRequest extends FormRequest
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
                Rule::unique('locations')->ignore($this->id,'id'),
                
            ],
            'staff_id' => 'required|numeric',
            'status' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'required' =>':attribute không được để trống',
            'unique' =>':attribute đã tồn tại',
            'max' =>':attribute không được vượt quá :max ký tự',
            'numeric'=>':attribute phải phải là số',
            
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên ghế',
            'staff_id' => 'Nhân viên',
            'status' => 'Trạng thái',
        ];
    }
}

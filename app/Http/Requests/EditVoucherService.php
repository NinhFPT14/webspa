<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class EditVoucherService extends FormRequest
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
            'code' => [
                'required','max:255',
                Rule::unique('service_vouchers')->ignore($this->id,'id'),
                
            ],
            'discount' => 'required|numeric|digits_between:4,11',
            'time_start' => 'required|before:time_end',
            'time_end' => 'required|after:time_start',
            'status' => 'required|numeric',
            'service_id' => 'required|numeric',
            
        ];
    }
    public function messages()
    {
        return [
            'required' =>':attribute không được để trống',
            'max' =>':attribute không được vượt quá :max ký tự',
            'unique' =>':attribute đã tồn tại',
            'digits_between' =>':attribute phải là số và phải nằm trong khoảng :min đến :max số',
            'numeric' =>':attribute phải là số',
            'after_or_equal' =>':attribute phải bằng hoặc lớn hơn thời gian hiện tại',
            'after' =>':attribute phải lớn hơn thời gian bắt đầu',
        ];
    }
    public function attributes()
    {
        return [
            'code' => 'Mã giảm giá',
            'discount' => 'Tiền giảm',
            'time_start' => 'Thời gian bắt đầu',
            'time_end' => 'Thời gian kết thúc',
            'status' => 'Trạng thái',
            'service_id' => 'Dịch vụ',
        ];
    }
}

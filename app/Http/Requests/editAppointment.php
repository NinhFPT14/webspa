<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editAppointment extends FormRequest
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
            'name' => 'required|max:255',
            'phone' => 'required|numeric|digits_between:10,11',
            'note' => 'max:65535',
            'time_ficked' => 'required|max:255',
            'time_start' => 'required|date|after_or_equal:today',
            'check_method' => 'required',
            
        ];
    }
    public function messages()
    {
        return [
            'required' =>':attribute không được để trống',
            'unique' =>':attribute đã tồn tại',
            'max' =>':attribute không được vượt quá :max ký tự',
            'digits_between'=>':attribute phải là số và từ :min đến :max số',
            'date'=>':attribute phải là thời gian',
            'after_or_equal'=>':attribute phải là ngày hôm nay hoặc sau ngày hôm nay',
            'numeric'=>':attribute phải phải là số',
            
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Họ tên',
            'phone' => 'Số điện thoại',
            'note' => 'Nội dung',
            'time_ficked' => 'Thời gian',
            'time_start' => 'Ngày hẹn',
            'check_method' => 'Phương thức thanh toán',
        ];
    }
}

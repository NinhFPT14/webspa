<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class addSortAppointment extends FormRequest
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
    $time =Carbon::now();
        return [
            'service_id' => 'required',
            'location_id' => 'required',
            'time_start' => "required|date|after_or_equal:$time",
            'time_end' => 'required|date|after:time_start',
        ];
    }
    public function messages()
    {
        return [
            'required' =>':attribute không được để trống',
            'date'=>':attribute phải là thời gian',
            'after_or_equal'=>':attribute phải sau thời gian hiện tại',
            'after'=>':attribute phải sau thời gian bắt đầu',
        ];
    }
    public function attributes()
    {
        return [
            'service_id' => 'Dịch vụ',
            'location_id' => 'Ghế làm',
            'time_start' => 'Thời gian bắt đầu',
            'time_end' => 'Thời gian kết thúc',
        ];
    }
}

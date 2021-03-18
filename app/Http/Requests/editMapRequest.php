<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editMapRequest extends FormRequest
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
            'link' => 'required|max:65535',
        ];
    }
    public function messages()
    {
        return [
            'required' =>':attribute không được để trống',
            'max' =>':attribute được vượt quá :max',
        ];
    }
    public function attributes()
    {
        return [
            'link' => 'Đường dẫn bản đồ',
        ];
    }
}

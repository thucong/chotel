<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtilityRequest extends FormRequest
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
            'ten' => 'required|min:2'
        ];
    }
    public function messages(){
        return[
        'ten.required' => 'Tên tiện ích không được để trống',
        'ten.min' => 'Tên có độ dài tối thiểu là 2'
    ];
    }
}

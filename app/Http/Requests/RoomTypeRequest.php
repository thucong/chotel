<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() 
    {
        return true; //true: điều kiện phải nhập vào , false: nhập hoặc ko
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
     public function messages()
    {
        return [
           'ten.required' => 'Tên không được để trống',
           'ten.min' => 'Tên tối thiểu là 2 ký tự' 
        ];
    }
}

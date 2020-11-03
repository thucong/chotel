<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'user' => 'required|min:2',
            'pass' => 'required|min:8',
            'fullname' => 'required'
        ];
    }
    public function messages()
    {
        return [
           'user.required' => 'Username không được để trống',
           'user.min' => 'Username tối thiểu là 2 ký tự',
           'pass.required'=> 'Password không được để trống',
           'pass.min' => 'Password tối thiểu là 8 ký tự',
           'fullname.required' => 'Fullname không được để trống'
        ];
    }
    
}

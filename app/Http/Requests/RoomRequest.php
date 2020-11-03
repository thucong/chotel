<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Blade;
use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
        return[
            'ten' => 'required|min:2',
            'mota' => 'required',
            'hinhanh' => 'image|mimes:jpg,png,jpeg,gif|max:2048',
            'loaiphong' =>'required',
            'tienich' => 'required'
        ];
    }
    public function messages(){
        return [
            'ten.required' => 'Tên phòng không được để trống',
            'ten.min' => 'Tên có độ dài tối thiểu là 2',
            'mota.required'=>'Mô tả không được để trống',
            'hinhanh.image' => 'Hình ảnh phải ở dạng hình ảnh',
            'hinhanh.mimes' => 'Hình ảnh phải có đuôi là jpg,png,jpeg,gif',
            'loaiphong.required' => 'Phải chọn loại phòng',
            'tienich.required' => 'Phải chọn tiện ích'
        ];
    }
}

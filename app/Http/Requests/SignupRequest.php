<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'username' => 'required|unique:users',
            'phone' => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:users',
        ];
    }
    public function messages()
    {
        return [
            'email.unique' => "Email này đã được sử dụng",
            'username.unique' => "Tên đăng nhập đã được sử dụng"
        ];
    }
}

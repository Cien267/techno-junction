<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class SettingInfoRequest extends FormRequest
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
            'website' => 'required',
            'domain' => 'required',
            'company' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'hotline' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'website.required' => 'Website không được trống',
            'domain.required' => 'Tên miền không được trống',
            'company.required' => 'Tên công ty không được trống',
            'address.required' => 'Địa chỉ không được trống',
            'email.required' => 'Email không được trống',
            'phone.required' => 'Số điện thoại không được trống',
            'hotline.required' => 'Hotline không được trống',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw (new ValidationException($validator))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());
    }
}



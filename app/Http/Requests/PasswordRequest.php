<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'old_password' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => '初始密码必须填写',
            'old_password.min' => '密码的长度过短',
            'password.min' => '密码的长度过短',
            'password.required' => '密码必须填写',
            'confirmed' => '两次填写的密码不一致'
        ];
    }
}

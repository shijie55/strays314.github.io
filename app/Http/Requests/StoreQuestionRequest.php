<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 是否开启验证
        return true;
    }

    /**
     * 验证字段别名
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'body' => '问题内容'
        ];
    }

    /**
     * 验证字段提示信息
     *
     * @return array
     */
    public function messages()
    {
       return [
           'required' => ':attribute必须填写',
           'title.min' => ':attribute不能少于4位',
           'title.max' => ':attribute不能超过30位',
           'body.min' => ':attribute不能少于26位'
       ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:30',
            'body' => 'required|min:26'
        ];
    }
}

<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UserPassEditRequest extends FormRequest
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
            //
            'data.*.password'=>'required|alpha_num|between:6,20',
        ];
    }
    public function messages()
    {
        return [
            'data.*.password.required'=>['name'=>'password','status'=>'请填写密码'],
            'data.*.password.alpha_num'=>['name'=>'password','status'=>'密码位数字或字母组成'],
            'data.*.password.between'=>['name'=>'password','status'=>'密码长度位6-20位'],
        ];
    }
}

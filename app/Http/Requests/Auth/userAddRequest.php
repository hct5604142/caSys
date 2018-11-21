<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
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
            'data.0.id'=>'required|unique:users,id|digits_between:6,7',
            'data.0.name'=>'required',
            'data.0.password'=>'required|alpha_num|between:6,20',
        ];
    }

    public function messages()
    {
        return [
            'data.0.id.required'=> ['name'=>'id','status'=>'账号必须填写'],
            'data.0.id.unique'=>['name'=>'id','status'=>'用户名已被使用'],
            'data.0.id.digits_between'=>['name'=>'id','status'=>'请使用6-7位数字'],
            'data.0.name.required'=>['name'=>'name','status'=>'请填写姓名'],
            'data.0.password.required'=>['name'=>'password','status'=>'请填写密码'],
            'data.0.password.alpha_num'=>['name'=>'password','status'=>'密码位数字或字母组成'],
            'data.0.password.between'=>['name'=>'password','status'=>'密码长度位6-20位'],
            ];
    }
}


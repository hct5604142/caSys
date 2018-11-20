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
            'data.*.id'=>'required|unique:users,id|digits_between:6,7',
            'data.*.name'=>'required',
            'data.*.password'=>'required|alpha_num|between:6,20',
        ];
    }

    public function messages()
    {
        $data=array();
        $field=['name'=>'id','status'=>'账号必须填写'];
        $field=array($field);
        $total=array('fieldErrors'=>$field,'data'=>$data);

        return [
            'data.*.id.required'=> $total,
            'user_id.unique'=>'用户名已被使用',
            'user_id.digits_between'=>'请使用6-7位数字',
            'user_name.required'=>'请填写姓名',
            'user_password.required'=>'请填写密码',
            'user_password.alpha_num'=>'密码为数字和字母',
            'user_password.between'=>'密码长度为6-8位',
            'user_password.confirmed'=>'两次密码输入应一致',
            ];
    }
}


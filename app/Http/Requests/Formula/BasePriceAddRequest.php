<?php

namespace App\Http\Requests\Formula;

use Illuminate\Foundation\Http\FormRequest;

class BasePriceAddRequest extends FormRequest
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
            'data.0.class_main'=>'required',
            'data.0.base_price'=>'numeric',
        ];
    }
    public function messages()
    {
        return [
            'data.0.class_main.required'=> ['name'=>'class_main','status'=>'必须填写'],
            'data.0.base_price.numeric'=>['name'=>'base_price','status'=>'必须为数字'],
        ];
    }
}

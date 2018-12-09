<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class EproductRequest extends FormRequest
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
            'data.0.order_number'=>'required',
            'data.0.exec_date'=>'date',
            'data.0.boxes_no'=>'numeric',
            'data.0.tonnage'=>'numeric',
        ];
    }
    public function messages()
    {
        return [
            'data.0.order_number.required'=> ['name'=>'order_number','status'=>'请填写订单号'],
            'data.0.exec_date.date'=>['name'=>'exec_date','status'=>'必须为日期格式 例：1988-10-18'],
            'data.0.boxes_no.numeric'=>['name'=>'boxes_no','status'=>'请输入数字格式 例：5.88'],
            'data.0.tonnage.numeric'=>['name'=>'tonnage','status'=>'请输入数字格式 例：5.88'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTreasuireRequest extends FormRequest
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
            'name'=>'required|unique:treasuries,name',
            'is_master'=>'required',
            'last_isal_exhcange'=>'required',
            'last_isal_collect'=>'required',
            'active'=>'required'
        ];
    }
    public function messages()
    {
        return
        [
           'name.required'=>'الرجاء ادخال اسم الخزينة حقل اجباري',
           'is_master.required'=>'الرجاء إدخال نوع الخزنة',
           'last_isal_exhcange.required'=>'الرجاء إدخال نوع الصرف',
           'last_isal_collect.required'=>'الرجاء إدخال نوع الايداع',
           'active.required'=>'الرجاء إدخال نظام الخزنة',
        ];
    }
}

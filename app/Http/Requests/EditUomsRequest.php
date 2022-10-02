<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUomsRequest extends FormRequest
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
            'name'=>'required|unique:uoms,name',
            'is_master'=>'required',
            'active'=>'required',
        ];
    }

    public function messages()
    {
        return
        [
           'name.required'=>'الرجاء ادخال اسم الوحدة حقل اجباري',
           'is_master.required'=>'الرجاء إدخال الوحدة الخزنة',
          
           'active.required'=>'الرجاء إدخال نظام الوحدة',
        ];
    }
}

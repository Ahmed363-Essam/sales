<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'name' => 'required|unique:stores,name',
            'active' => 'required',
            'phones' => 'required',
            'address' => 'required'
        ];
    }

    public function messages()
    {
        return
        [
            'name.required'=>'فئة المعيار حقل اجباري',
            'name.unique'=>'هذه الفئة موجودة مسبقا',
            'active.required'=>'حقل التفعيل اجباري',
            'phones.required'=>'رقم الهاتف اجباري',
            'address.required'=>'عنوان الحققل اجباري',
        ];
    }
}

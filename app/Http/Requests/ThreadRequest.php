<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class ThreadRequest extends Request
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
            'addThreadBrand'    =>  'required|unique:tblThread,strThreadBrand',
            'editThreadBrand'   =>  'unique:tblThread,strThreadBrand'
        ];
    }

    public function messages()
    {
        return [
            'addThreadBrand.unique'  =>  'Thread already exists.',
            'addThreadBrand.required' => 'Thread name is required.',
            'editThreadBrand.unique'  => 'Thread name already exists.'
        ];

    }


    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

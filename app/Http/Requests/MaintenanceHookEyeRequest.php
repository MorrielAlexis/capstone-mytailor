<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class MaintenanceHookEyeRequest extends Request
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
            'strHookBrand'    =>  'required|unique_with:tblHookEye,strHookColor,strHookSize',
            // 'editThreadBrand'   =>  'unique:tblThread,strThreadBrand'
        ];
    }

    public function messages()
    {
        return [
            'strHookBrand.unique'  =>  'Hook and eye already exists.',
            'strHookBrand.required' => 'Hook and eye name is required.'
            // 'editThreadBrand.unique'  => 'Thread name already exists.'
        ];

    }


    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

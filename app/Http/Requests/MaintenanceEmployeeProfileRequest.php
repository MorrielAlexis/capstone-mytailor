<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;


class MaintenanceEmployeeProfileRequest extends Request
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
            'strEmpFName'       =>  'required|unique_with:tblEmployee,strEmpMName,strEmpLName',
            'strEmpLName'       =>  'required',
            'dtEmpBday'         =>  'required',
            'strSex'            =>  'required',
            'strCellNo'         =>  'unique:tblEmployee|regex:/^\d{11}/',
            'strCellNoAlt'      =>   'unique:tblEmployee|regex:/^\d{11}/',
            'strEmailAdd'       =>  'unique:tblEmployee|email'
           
        ];
    }

    public function messages()
    {
        return [
        
            'strEmpFName.required'    =>  'First name is required.',
            'strEmpFName.unique_with' =>  'Name already exists.',
            'strEmpLName.required'   =>  'Last name is required.',
            'dtEmpBday.required'     =>  'Birth date is required.',
            'strSex.required'        =>  'Sex is required',
            'strCellNo.regex'        =>  'Invalid contact number format.',
            'strCellNoAlt.regex'     =>  'Invalid contact number format.',
            'strEmail.email'         =>  'Invalid email format.',
            'strEmail.unique'         =>  'Email already exists.',
            'strCellNo.unique'       =>  'Contact number already exists.',
            'strCellNoAlt.unique'   =>  'Contact alternate number already exists.'
            
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();
    }
}

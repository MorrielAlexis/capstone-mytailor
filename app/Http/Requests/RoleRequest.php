<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Illuminate\Contracts\Validation\Validator;

class RoleRequest extends Request
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
            'strEmpRoleName'    =>  'required|unique:tblEmployeeRole,strEmpRoleName'
            
        ];
    }

    public function messages()
    {
        return [
            'strEmpRoleName.unique'  =>  'Role already exists.',
            'strEmpRoleName.required' => 'Role name is required.'
            
        ];

    }


    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

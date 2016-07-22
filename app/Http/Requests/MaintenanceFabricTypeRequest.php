<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class MaintenanceFabricTypeRequest extends Request
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
            'strFabricTypeName'    =>  'required|unique:tblFabricType,strFabricTypeName'
        ];
    }

    public function messages()
    {
        return [

            'strFabricTypeName.unique'  =>  'Fabric type already exists.',
            'strFabricTypeName.required'  =>  'Fabric type name is required.'
            
            
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

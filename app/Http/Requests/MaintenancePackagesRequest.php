<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class MaintenancePackagesRequest extends Request
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
            'strPackageName'    =>  'required|unique:tblPackages'

           
            // 'strGarmentCategoryName' => 'regex:/^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?/''
        ];
    }

    public function messages()
    {
        return [

            // 'strPackageName.unique'  =>  'Garment already exists.',
            'strPackageName.required'  =>  'Package name is required.',
            'strPackageName.unique'  =>  'Package name alrady exists.'
           
            
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

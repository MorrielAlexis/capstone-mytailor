<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class MaintenanceStandardSizeCategoryRequest extends Request
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
            'strStandardSizeCategoryName' => 'required|unique:tblStandardSizeCategory,strStandardSizeCategoryName'
              
        ];
    }

    public function messages()
    {
        return [
            'strStandardSizeCategoryName.unique'  =>  'Standard size category already exists.',
            'strStandardSizeCategoryName.required'  =>  'Standard size category name is required.'
            
        ];

    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

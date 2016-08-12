<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class ChargeCategoryRequest extends Request
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
            'strChargeCatName' => 'required|unique:tblChargeCategory'
            
            
        ];
    }

    public function messages()
    {
        return [
            'strChargeCatName.unique'  =>  'Charge category  already exists.',
            'strChargeCatName.required'  =>  'Charge category  name is required.'
            
            
            
        ];

    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

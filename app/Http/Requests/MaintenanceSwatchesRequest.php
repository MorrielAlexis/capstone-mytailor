<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class MaintenanceSwatchesRequest extends Request
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
            'strSwatchCode' => 'required|unique_with:tblSwatch,strSwatchTypeFK,
strSwatchNameFK'
            
            
        ];
    }

    public function messages()
    {
        return [
            'strSwatchCode.unique_with'  =>  'Swatch code already exists.',
            'strSwatchCode.required'  =>  'Swatch code is required.'
            
            
            
        ];

    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

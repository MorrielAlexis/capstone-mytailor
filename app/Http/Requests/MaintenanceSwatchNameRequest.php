<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;



class MaintenanceSwatchNameRequest extends Request
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
            'strSName' => 'required|unique_with:tblSwatchName,strSwatchNameTypeFK'
            
            
        ];
    }

    public function messages()
    {
        return [
            'strSName.unique_with'  =>  'Swatch name already exists.',
            'strSName.required'  =>  'Swatch name name is required.'
            
            
            
        ];

    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

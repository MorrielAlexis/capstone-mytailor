<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class MaintenanceFabricPatternRequest extends Request
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
            'strFabricPatternName' => 'required|unique:tblFabricPattern'
            
            
        ];
    }

    public function messages()
    {
        return [
            'strFabricPatternName.unique'  =>  'Pattern  already exists.',
            'strFabricPatternName.required'  => 'Pattern  name is required.'
            
            
            
        ];

    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

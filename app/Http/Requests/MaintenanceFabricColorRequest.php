<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class MaintenanceFabricColorRequest extends Request
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
            'strFabricColorName' => 'required|unique:tblFabricColor'
            
            
        ];
    }

    public function messages()
    {
        return [
            'strFabricColorName.unique'  =>  'Color  already exists.',
            'strFabricColorName.required'  =>  'Color  name is required.'
            
            
            
        ];

    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class MaintenanceNeedleRequest extends Request
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
            'strNeedleBrand'    =>  'required|unique_with:tblNeedle,strNeedleSize'
            
        ];
    }

    public function messages()
    {
        return [
            'strNeedleBrand.unique'  =>  'Needle already exists.',
            'strNeedleBrand.required' => 'Needle name is required.'
           
        ];

    }


    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

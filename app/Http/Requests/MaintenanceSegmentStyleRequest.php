<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class MaintenanceSegmentStyleRequest extends Request
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
            'strSegStyleName' => 'required|unique_with:tblSegmentStyleCategory,strSegmentFK'
            
            
        ];
    }

    public function messages()
    {
        return [
            'strSegStyleName.unique_with'  =>  'Alteration name already exists.',
            'strSegStyleName.required'  =>  'Alteration name is required.'
            
            
            
        ];

    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

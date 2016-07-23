<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class MaintenanceMeasDetailRequest extends Request
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
            'strMeasDetailName' => 'required|unique_with:tblMeasurementDetail,strMeasDetSegmentFK,
strMeasCategoryFK'
            
            
            
        ];
    }

    public function messages()
    {
        return [
            'strMeasDetailName.unique'  =>  'Measurement detail name already exists.',
            'strMeasDetailName.required'  =>  'Measurement detail name is required.'
           
            
        ];

    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

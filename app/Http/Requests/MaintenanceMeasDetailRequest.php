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
            'strMeasurementDetailName' => 'required|unique:tblMeasurementDetail,strMeasurementDetailName'
            
            
        ];
    }

    public function messages()
    {
        return [
            'strMeasurementDetailName.unique'  =>  'Measurement detail name already exists.',
            'strMeasurementDetailName.required'  =>  'Measurement detail name is required.'
            
            
            
        ];

    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

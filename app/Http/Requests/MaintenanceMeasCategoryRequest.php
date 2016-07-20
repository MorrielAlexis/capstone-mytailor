<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;


class MaintenanceMeasCategoryRequest extends Request
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
            'strMeasurementCategoryName' => 'required|unique_with:tblMeasurementCategory,strMeasurementCategoryName'
              
        ];
    }

    public function messages()
    {
        return [
            'strMeasurementCategoryName.unique_with'  =>  'Measurement detail name already exists.',
            'strMeasurementCategoryName.required'  =>  'Measurement detail name is required.'
            
        ];

    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
} 

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
            'strMeasDetFK' => 'required|unique_with:tblMeasurementCategory,strMeasSegmentFK'
            
            
        ];
    }

    public function messages()
    {
        return [
            'strMeasDetFK.unique_with'  =>  'Measurement detail name already exists.',
            'strMeasDetFK.required'  =>  'Measurement detail name is required.'
            
            
            
        ];

    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }

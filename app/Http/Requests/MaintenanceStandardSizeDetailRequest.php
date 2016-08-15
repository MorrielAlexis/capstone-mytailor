<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class MaintenanceStandardSizeDetailRequest extends Request
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
            'strStanSizeDetailName'    =>  'required|unique_with:tblStandardSizeDetail,strStanSizeSegmentFK','strStanSizeMeasCatFK','strStanSizeCategoryFK','strStanSizeFitType',
            'dblStanSizeInch'   => 'numeric|required',
            'dblStanSizeCm'     => 'numeric|required'
            
        ];
    }

     public function messages()
    {
        return [

            'strStanSizeDetailName.unique_with'  =>  'Standard size detail already exists.',
            'strStanSizeDetailName.required'     =>  'Standard size detail name is required.',
            'dblStanSizeCm.numeric'     =>  'Invalid size format. Only numbers are allowed.',
            'dblStanSizeCm.required'    =>  'Minimun size in cm is required.',
            'dblStanSizeInch.numeric'     =>  'Invalid size format. Only numbers are allowed.',
            'dblStanSizeInch.required'    =>  'Minimun size in inch is required.'
           
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

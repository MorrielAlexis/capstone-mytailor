<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class MaintenanceCustomerIndividualRequest extends Request
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
            'strIndivFName' => 'unique_with:tblCustIndividual,strIndivMName,strIndivLName',

            'strIndivCPNumber' => 'unique|regex:/^\d{11}/',

            'strIndivEmailAddress' => 'unique|email'
            
        ];
    }

    public function messages()
    {
        return [
            'strIndivFName.required'     =>  'First name is required.',
            'strIndivFName.unique_with'  =>  'Name already exists.',
            'strIndivLName.required'      =>  'Last name is required.',
            'strIndivCPNumber.regex'    =>  'Invalid contact number format.',

            'strIndivEmailAddress.unique' => 'Email address already exists!Please enter your correct email address.'
            'strIndivEmailAddress.email' => 'Invalid email address format.'
            
            
        ];

    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

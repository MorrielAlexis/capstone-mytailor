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
     * Get the validation rules that apply to the request.ind
     *
     * @return array
     */
       public function rules()
    {
        return [
            'strIndivFName' => 'unique_with:tblCustIndividual,strIndivMName,strIndivLName',
            'strIndivSex'            =>  'required',
            'strIndivCPNumber'         =>  'unique:tblCustIndividual|regex:/^\d{11}/',
            'strIndivEmailAddress'       =>  'unique:tblCustIndividual|email',
            'strIndivLandlineNumber'     => 'unique:tblCustIndividual'
            // 'strIndivEmailAddress' => 'unique|email'
            
        ];
    }

    public function messages()
    {
        return [
                'strIndivFName.required'     =>  'First name is required.',
                'strIndivFName.unique_with'  =>  'Name already exists.',
                'strIndivLName.required'     >  'Last name is required.',
                'strIndivCPNumber.regex'    =>  'Invalid contact number format.',
                'strIndivCPNumber.unique'   => 'Contact number already exists!',
            'strIndivEmailAddress.unique'   =>'Email address is already in use.',
            'strIndivEmailAddress.email'         =>  'Invalid email format.', 
            'strIndivSex.required'          =>'Sex is required.',
            'strIndivLandlineNumber.unique'        =>'Landline number already exists.'

                // 'strIndivEmailAddress.unique' => 'Email address already exists!Please enter your correct email address.',
            // 'strIndivEmailAddress.email' => 'Invalid email address format.'
            
            
        ];

    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Illuminate\Contracts\Validation\Validator;

class MaintenanceCustomerCompanyRequest extends Request
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
            'strCompanyName'          => 'unique:tblCustCompany|required',
            'strCompanyCPNumber'      => 'unique:tblCustCompany|regex:/^\d{11}/',
            'strCompanyEmailAddress'  => 'unique:tblCustCompany|email',
            'strCompanyTelNumber'     => 'unique:tblCustCompany'
            // 'strIndivEmailAddress' => 'unique|email'
            
        ];
    }

    public function messages()
    {
        return [
                'strCompanyName.required'       =>  'Name is required.',
                'strCompanyName.unique'         =>  'Name already exists.',
                'strCompanyCPNumber.regex'      =>  'Invalid contact number format.',
                'strCompanyCPNumber.unique'     => 'Contact number already exists!',
                'strCompanyEmailAddress.unique' =>'Email address is already in use.',
                'strCompanyEmailAddress.email'  =>  'Invalid email format.', 
                'strCompanyTelNumber.unique'    =>'Landline number already exists.'
            
        ];

    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

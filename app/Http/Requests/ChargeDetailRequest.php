<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class ChargeDetailRequest extends Request
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
            'strChargeDetSegFK' => 'required|unique_with:tblChargeDetail,strChargeCatFK'
            
            
        ];
    }

    public function messages()
    {
        return [
            'strChargeDetSegFK.unique_with'  =>  'Charge detail already exists.',
            'strChargeDetSegFK.required'  =>  'Charge detail is required.'
            
            
            
        ];

    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }}

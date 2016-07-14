<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class MaintenanceZipperRequest extends Request
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
            'strZipperBrand'    =>  'required|unique_with:tblZipper,strZipperColor',
            'addImg'            => 'image'
         
        ];
    }

    public function messages()
    {
        return [
            'strZipperBrand.unique'   =>  'Zipper already exists.',
            'strZipperBrand.required' => 'Zipper name is required.',
            'addImg.image'            => 'The file you uploaded is not an image.'  
            
        ];

    }


    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

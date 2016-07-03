<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;

use App\Http\Requests\Request;

class MaintenanceCatalogueRequest extends Request
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
            'strCatalogueName' => 'required|unique_with:tblCatalogue,strCatalogueCategoryFK'
            
            
        ];
    }

    public function messages()
    {
        return [
            'strCatalogueName.unique_with'  =>  'Catalogue name already exists.',
            'strCatalogueName.required'  =>  'Catalogue name is required.'
            
            
            
        ];

    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

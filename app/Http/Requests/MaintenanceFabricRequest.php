<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;
class MaintenanceFabricRequest extends Request
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
            'strFabricName'    =>  'required|unique_with:tblFabric,strFabricTypeFK','strFabricPatternFK','strFabricColorFK','strFabricThreadCountFK','strFabricCode',
            'dblFabricPrice'   => 'numeric|required',
            'addImg' =>    'image'
        ];
    }

     public function messages()
    {
        return [

            'strFabricName.unique_with'  =>  'Fabric already exists.',
            'strFabricName.required'     =>  'Fabric name is required.',
            'dblFabricPrice.numeric'     =>  'Invalid price format. Only numbers are allowed.',
            'dblFabricPrice.required'    =>  'Fabric price is required.',
            'addImg.image'       => 'The file you uploaded is not an image.'
           
           
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

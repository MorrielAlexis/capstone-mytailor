<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;



class MaintenanceThreadCountRequest extends Request
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
            'strThreadCountName' => 'required|unique:tblThreadCount'
            
            
        ];
    }

    public function messages()
    {
        return [
            'strThreadCountName.unique'  =>  'Thread count  already exists.',
            'strThreadCountName.required'  =>  'Thread count  name is required.'
            
            
            
        ];

    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

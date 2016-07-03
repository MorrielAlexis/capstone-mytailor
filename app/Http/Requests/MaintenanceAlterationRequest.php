<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Requests\Request;

class MaintenanceAlterationRequest extends Request
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
            'strAlterationName' => 'required|unique:tblAlteration,strAlterationName'
            
            
        ];
    }

    public function messages()
    {
        return [
            'strAlterationName.unique'  =>  'Alteration name already exists.',
            'strAlterationName.required'  =>  'Alteration name is required.'
            
            
            
        ];

    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

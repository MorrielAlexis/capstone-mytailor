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
            'strAlterationName' => 'required|unique_with:tblAlteration,strAlterationSegmentFK',
             'dblAlterationPrice'   => 'numeric|required',
             'intAlterationMinDays' => 'numeric|required'
            
            
        ];
    }

    public function messages()
    {
        return [
            'strAlterationName.unique_with'  =>  'Alteration name already exists.',
            'strAlterationName.required'  =>  'Alteration name is required.',
            'dblAlterationPrice.numeric' => 'Alteration price must be numeric.',
            'intAlterationMinDays.numeric' => 'Minimum production days must be numeric.',

            'dblAlterationPrice.required' => 'Alteration price is required.',
            'intAlterationMinDays.required' => 'Alteration minimum days must be numeric.'
            
            
            
        ];

    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

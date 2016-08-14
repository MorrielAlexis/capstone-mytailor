<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;
class MaintenanceButtonRequest extends Request
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
            'strButtonBrand'    =>  'required|unique_with:tblButton,strButtonSize,strButtonColor'
    
    }

    public function messages()
    {
        return [
            'strButtonBrand.unique'  =>  'Button already exists.',
            'strButtonBrand.required' => 'Button name is required.'
        ];

    }


    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

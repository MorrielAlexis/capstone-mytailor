<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

use Illuminate\Contracts\Validation\Validator;

class GarmentCategoryRequest extends Request
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
            'strGarmentCategoryName'    =>  'required|unique:tblGarmentCategory,strGarmentCategoryName',
            // 'strGarmentCategoryName' => 'regex:/^[a-zA-Z\-'`]+(\s[a-zA-Z\-'`]+)?/''
        ];
    }

    public function messages()
    {
        return [

            'strGarmentCategoryName.unique'  =>  'Garment already exists.',
            'strGarmentCategoryName.required'  =>  'Garment name is required.',
            'strGarmentCategoryName.regex'     =>  'Invalid garment name format.'
            
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

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
            'addGarmentName'    =>  'required|unique:tblGarmentCategory,strGarmentCategoryName',
            'editGarmentName'   =>  'required|unique:tblGarmentCategory,strGarmentCategoryName'
        ];
    }

    public function messages()
    {
        return [

            'addGarmentName.unique'  =>  'Garment already exists.',
            'addGarmentName.required' => 'Garment name is required.',
            // 'editGarmentName.unique'  => 'Garment already exists.'
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

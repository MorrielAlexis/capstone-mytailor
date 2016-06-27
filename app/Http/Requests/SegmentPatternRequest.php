<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class SegmentPatternRequest extends Request
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
            'strSegPName' => 'required|unique_with:tblSegmentPattern,strSegPNameFK',
            'strSegPImage' => 'image'
            
        ];
    }

    public function messages()
    {
        return [
            'strSegPName.unique'  =>  'Pattern already exists.',
            'strSegPName.required'  =>  'Pattern name is required.',
            'strSegPImage.image' => 'The file you uploaded is not an image.'
            
            
        ];

    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

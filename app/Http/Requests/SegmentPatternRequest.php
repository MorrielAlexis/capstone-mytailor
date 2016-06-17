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
            'addPatternName' => 'unique:tblSegmentPattern,strSegPName',
            'addImg' => 'image',
            'editPatternName' => 'unique:tblSegmentPattern,strSegPName'
        ];
    }

    public function messages()
    {
        return [
            'addPatternName.unique'  =>  'Pattern already exists.',
            'addImg.image' => 'The file you uploaded is not an image.',
            'editPatternName.unique' => 'Pattern already exists.'
            
        ];

    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

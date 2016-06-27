<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;


class SegmentRequest extends Request
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
            'strSegmentName'    =>  'required|unique_with:tblSegment,strSegCategoryFK'
    
        ];
    }

     public function messages()
    {
        return [

            'strSegmentName.unique'  =>  'Segment already exists.',
            'strSegmentName.required'  =>  'Segment name is required.'
           
           
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

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
            'addSegmentName'    =>  'required|unique:tblSegment,strSegmentName',
            'editSegmentName' => 'unique:tblSegment,strSegmentName'
           

            

            // 'editGarmentName'   =>  'required|unique:tblGarmentCategory,strGarmentCategoryName'
        ];
    }

     public function messages()
    {
        return [

            'addSegmentName.unique'  =>  'Segment already exists.',
            'addSegmentName.required' => 'Segment name is required.',
            // 'strSegmentName.required'  =>  'Segment name is required.'
            'editGarmentName.unique'  => 'Garment already exists.'
           
        ];
    }

    protected function formatErrors(Validator $validator)
    {
        return $validator->errors()->all();

    }
}

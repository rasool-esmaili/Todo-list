<?php

namespace App\Http\Requests;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreTask extends FormRequest
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
        'title' =>'string | required',
        'state' =>'string | required',
        'group_id' =>'required | numeric ',
        'deadline' =>'required | Date',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'group_id.numeric' => 'group is required',
        ];
    }

}

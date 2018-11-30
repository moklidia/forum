<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupValidation extends FormRequest
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
            'name' => 'required|alpha_num|min:4|max:255',
            'description' => 'required|max:255',
        ];
    }

    /*    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'description.required' => 'Description is required!',
        ];
    }*/

}

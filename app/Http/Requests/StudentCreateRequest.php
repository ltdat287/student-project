<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StudentCreateRequest extends Request
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
            //
            'name' => 'required|min:6',
            'age' => 'required|numeric|min:1920|max:2000',
            'address' => 'required|min:6|max:50',
            'gender' => 'required|boolean',
        ];
    }
}

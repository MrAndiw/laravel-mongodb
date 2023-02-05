<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class MileRequest extends FormRequest
{
    public function rules()
    {
        return [
            'customer_name'=> 'required',
            'customer_code'=> 'required|max:50',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
    public function messages() //OPTIONAL
    {
        return [
            '_id.required' => '_id is required',
            'customer_name.required' => 'customer_name is required',
            'customer_code.required' => 'customer_code is required',
        ];
    }
}

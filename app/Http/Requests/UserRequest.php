<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ];
    }

    public function failedValidation(Validator $validator)
    {

        $response = [
            'success' => false,
            'message' => implode(',', $validator->errors()->all()),
            'data' => ''
        ];

        throw new HttpResponseException(response()->json($response, 422));
    }

    public function messages()
    {
        return [];
    }
}

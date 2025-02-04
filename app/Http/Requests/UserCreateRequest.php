<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstname'   => 'required|string|max:255',
            'lastname'    => 'max:255',
            'picture'     => 'required|string',
            'position'    => 'required|string',
            'description' => '',
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'firstname.required' => 'A firstname is required',
            'firstname.max'      => 'A firstname must be max. :max characters',
            'lastname.max'       => 'A lastname must be max. :max characters',
            'picture.required'   => 'A picture is required',
            'position.required'  => 'A position is required',
        ];
    }

    /**
     * @param Validator $validator
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => $validator->messages(),
        ]));
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserUpdateRequest extends FormRequest
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
            'firstname'   => 'string|max:255',
            'lastname'    => 'max:255',
            'picture'     => 'string',
            'position'    => 'string',
            'description' => '',
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'firstname.max' => 'A firstname must be max. :max characters',
            'lastname.max'  => 'A lastname must be max. :max characters',
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

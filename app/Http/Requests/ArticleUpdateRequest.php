<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ArticleUpdateRequest extends FormRequest
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
            'title'       => 'string|max:50',
            'description' => 'string|max:500',
            'body'        => 'string',
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.max'       => 'The article title must contain a maximum of :max characters',
            'description.max' => 'The article description must contain a maximum of :max characters',
        ];
    }

    /**
     * @param Validator $validator
     * @throws HttpResponseException
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => $validator->messages()->first(),
        ]));
    }
}

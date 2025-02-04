<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ArticleCreateRequest extends FormRequest
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
            'title'       => 'required|string|max:50',
            'description' => 'required|string|max:500',
            'body'        => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function messages(): array
    {
        return [
            'title.required'       => 'The article must have a title',
            'title.max'            => 'The article title must contain a maximum of :max characters',
            'description.required' => 'The article must have a description',
            'description.max'      => 'The article description must contain a maximum of :max characters',
            'body.required'        => 'The article must have a body',
        ];
    }

    /**
     * @param Validator $validator
     * @return string
     */
    public function failedValidation(Validator $validator): string
    {
        throw new HttpResponseException(response()->json([
            'message' => $validator->messages()->first(),
        ]));
    }
}

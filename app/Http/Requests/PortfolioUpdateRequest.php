<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Http\Exceptions\HttpResponseException;

class PortfolioUpdateRequest extends FormRequest
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
            "title"=>'string|min:3',
            "color"=>'string|min:4',
            "about"=>'string|min:3',
            'img'=>'nullable|file|mimes:jpg,jpeg,svg,png,webp|max:2048'
        ];
    }

    /**
     * @return array
     */
    public function messages():array
    {
        return [
            "title.min"=>"The title must have at least 3 characters.",
            "color.min"=>"The color must have at least 6 characters.",
            "about.min"=>"The field about must have at least 3 characters 3 characters",

        ];
    }

    /**
     * @param Validator $validator
     * @throws HttpClientException
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => $validator->messages()->first(),
        ]));
    }
}

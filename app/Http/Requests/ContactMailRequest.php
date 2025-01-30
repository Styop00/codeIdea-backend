<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContactMailRequest extends FormRequest
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
            "name"=>"required|min:3|string",
            'phone'=>"required|min:5",
            "message"=>'required|string|min:5',
            "email"=>"email|required|min:5"
        ];
    }
    public function messages():array
    {
        return [
          "name.required"=>"Name is required",
          "name.min"=>"The name must have at least 3 characters",
          "phone.min"=>"The phone must have at least 5 characters" ,
          "message.min"=>"The message field must have at least 5 characters" ,
          "email.min"=>"The email field must have at least 3 characters" ,
            "phone.required"=>"Phone is required",
            "message"=>"message is required",
            "email"=>"Email is required",
        ];

    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => $validator->messages()->first(),
        ]));
    }
}

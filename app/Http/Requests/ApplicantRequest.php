<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApplicantRequest extends FormRequest
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
            "fullname"          => "required|string|min:3",
            "phone_number"      => "required|string|min:5",
            'email'             => "required|email|min:5",
            "applied_position"  => "required|string",
            "applied_date"      => "date",
            "about_applicant"   => 'string',
            "cv_applicant"      => "required|file|mimes:pdf|max:2048",
            "additional_file"   => 'array',
            "additional_file.*" => 'file|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            "fullname.required"         => "Full name is required.",
            "fullname.string"           => "Full name must be a string.",
            "fullname.min"              => "Full name must be at least 3 characters.",
            "phone_number.required"     => "Phone number is required.",
            "phone_number.string"       => "Phone number must be a string.",
            "phone_number.min"          => "Phone number must be at least 5 characters.",
            "email.required"            => "Email is required.",
            "email.email"               => "Please enter a valid email address.",
            "email.min"                 => "Email must be at least 5 characters.",
            "applied_position.required" => "Applied position is required.",
            "applied_position.string"   => "Position must be a string.",
            "applied_date.required"     => "Application date is required.",
            "applied_date.date"         => "Please enter a valid date.",
            "about_applicant.string"    => "About applicant must be a string.",
            "cv_applicant.required"     => "CV is required.",
            "cv_applicant.file"         => "CV must be a valid file.",
            "cv_applicant.mimes"        => "CV must be a PDF file.",
            "cv_applicant.max"          => "CV size must not exceed 2MB.",
            "additional_file.array"     => "Additional files must be an array.",
            "additional_file.*.file"    => "Each file must be a valid file.",
            "additional_file.*.mimes"   => "Accepted file formats: PDF, JPG, PNG.",
            "additional_file.*.max"     => "Each file must not exceed 2MB.",
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => $validator->messages()->first(),
        ], 422));
    }
}

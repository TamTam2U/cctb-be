<?php

namespace App\Requests;

use App\Helper\ValidationErrorResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Kata Sandi'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute harus diisi',
            'email' => 'Email tidak valid',
        ];
    }

    public function failedValidation($validator)
    {
        $response = ValidationErrorResponse::generate($validator); 
        throw new HttpResponseException($response);
    }
}

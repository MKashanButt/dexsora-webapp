<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'min:1', 'unique:users,name'],
            'email' => ['required', 'string', 'max:255', 'min:1', 'unique:users,email'],
            'password' => ['required', 'string', 'max:255', 'min:4'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'name.string' => 'Name should be a valid string',
            'name.max' => 'Name should be under 255 words',
            'name.min' => 'Name should atleast be 1 words long',
            'name.unique' => 'Name already in use',

            'email.required' => 'Email is required',
            'email.string' => 'Email should be a valid string',
            'email.max' => 'Email should be under 255 words',
            'email.min' => 'Email should atleast be 1 words long',
            'email.unique' => 'Email already in use',

            'password.required' => 'Password is required',
            'password.string' => 'Password should be a valid string',
            'password.max' => 'Password should be under 255 words',
            'password.min' => 'Password should be atleast 4 words',
        ];
    }
}

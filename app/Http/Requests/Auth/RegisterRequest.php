<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'                 => 'required|string|max:255',
            'email'                => 'required|email|unique:users,email',
            'password'             => 'required|string|min:8|confirmed',
            'terms_and_conditions' => 'required|accepted',
            'user_type'            => 'required|in:trucker,shipper,admin',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Email format is invalid.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
            'terms_and_conditions.required' => 'You must accept the terms and conditions.',
            'terms_and_conditions.accepted' => 'You must accept the terms and conditions.',
            'user_type.required' => 'User type is required.',
            'user_type.in' => 'Invalid user type selected.',
        ];
    }
}

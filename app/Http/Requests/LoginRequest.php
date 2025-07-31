<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

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
            'email' => ['required', 'string', 'email', 'max:255', 'min:1'],
            'password' => ['required', 'string', 'min:4', 'max:255'],
        ];
    }

    public function throttleKey(): string
    {
        return Str::transliterate(Str::tolower($this->get('email')) . '|' . $this->ip());
    }

    public function ensureRateLimit()
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), config('auth.rate_limit'))) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'minutes' => ceil($seconds / 60),
                'seconds' => $seconds
            ]),
        ]);
    }

    public function authenticate(): void
    {
        $this->ensureRateLimit();

        if (!Auth::attempt($this->get('email'), $this->get('password'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => 'auth.failed',
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }
}

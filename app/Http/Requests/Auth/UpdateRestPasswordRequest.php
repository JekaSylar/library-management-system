<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRestPasswordRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'min:8'],
        ];
    }

    public function messages(): array
    {
        return [
            'token.required' => 'Токен скидання пароля є обов’язковим.',

            'email.required' => 'Email є обов’язковим для заповнення.',
            'email.email' => 'Введіть коректну адресу електронної пошти.',

            'password.required' => 'Пароль є обов’язковим для заповнення.',
            'password.min' => 'Пароль повинен містити щонайменше 8 символів.',
            'password.confirmed' => 'Паролі не збігаються.',

            'password_confirmation.required' => 'Підтвердження пароля є обов’язковим.',
            'password_confirmation.min' => 'Підтвердження пароля повинно містити щонайменше 8 символів.',
        ];
    }
}

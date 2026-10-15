<?php

namespace App\Http\Requests\Profile;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', ],
            'password' => ['nullable', 'required_with:password', 'string', 'min:8', 'confirmed', 'different:current_password'],
            'current_password' => ['nullable', 'required_with:current_password', 'string', 'current_password',],
            'password_confirmation' => [
                'nullable',
                'required_with:password',
                'same:password'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Прізвище та Ім’я є обов’язковими для заповнення.',
            'name.string' => 'Прізвище та Ім’я мають бути рядком.',
            'name.max' => 'Прізвище та Ім’я не можуть містити більше ніж 255 символів.',

            'current_password.required' => 'Введіть поточний пароль.',
            'current_password.current_password' => 'Введено неправильний поточний пароль.',

            'password.required' => 'Введіть новий пароль.',
            'password.string' => 'Новий пароль має бути рядком.',
            'password.min' => 'Новий пароль повинен містити щонайменше 8 символів.',
            'password.confirmed' => 'Новий пароль і підтвердження пароля не збігаються.',
            'password.different' => 'Новий пароль повинен відрізнятися від поточного пароля.',

            'password_confirmation.required_with' => 'Будь ласка, підтвердіть новий пароль.',
            'password_confirmation.same' => 'Паролі не збігаються.',
        ];
    }
}

<?php

namespace App\Http\Requests\Workplace;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class WorkplaceRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'house' => ['required', 'string', 'max:255'],
            'is_active' => ['required', 'boolean'],

        ];
    }

    public function messages(): array
    {
        return [

            'name.required' => 'Введіть назву.',
            'name.string' => 'Назва має бути рядком.',
            'name.max' => 'Назва не може містити більше ніж 255 символів.',


            'city.required' => 'Вкажіть місто.',
            'city.string' => 'Назва міста має бути рядком.',
            'city.max' => 'Назва міста не може містити більше ніж 255 символів.',


            'street.required' => 'Вкажіть вулицю.',
            'street.string' => 'Назва вулиці має бути рядком.',
            'street.max' => 'Назва вулиці не може містити більше ніж 255 символів.',


            'house.required' => 'Вкажіть номер будинку.',
            'house.string' => 'Номер будинку має бути рядком.',
            'house.max' => 'Номер будинку не може містити більше ніж 255 символів.',


            'is_active.required' => 'Вкажіть статус запису.',
            'is_active.boolean' => 'Статус запису має бути логічним значенням.',
        ];
    }
}

<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserApiRequest extends FormRequest
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
            'name' => ['nullable', 'string', 'max:255'],
//            'slug' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['nullable', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user())],
            'avatar' => ['nullable', 'max:2048', 'mimes:jpeg,jpg,png,webp'],
        ];
    }

    public function messages()
    {
        return [
            'avatar.mimes' => 'The avatar must be a file of type: jpeg, jpg, png.',
            'avatar.max' => 'The avatar may not be greater than 2MB.'
        ];
    }
}

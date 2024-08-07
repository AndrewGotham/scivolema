<?php

namespace App\Http\Requests\Api\V1;

use App\Enums\AnswerStatus;
use App\Enums\UserStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthUserApiRequest extends FormRequest
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
//            'language_id' => ['nullable', 'integer'],
//            'name' => ['required', 'string', 'max:255'],
//            'slug' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
//            'avatar' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
//            'status' => ['nullable', Rule::enum(UserStatus::class)],
//            'status_note' => ['nullable', 'string'],
        ];
    }
}

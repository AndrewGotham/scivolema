<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class QuestionUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'language_id' => ['required', 'exists:languages,id'],
            'title' => ['required', 'max:255', 'string'],
            'slug' => [
                'required',
                Rule::unique('questions', 'slug')->ignore($this->question),
                'max:255',
                'string',
            ],
            'body' => ['required', 'max:255', 'string'],
            'views' => ['required', 'max:255'],
            'score' => ['required', 'max:255'],
            'tags' => ['nullable', 'max:255', 'json'],
            'status' => ['required', 'in:published,pending,rejected'],
            'status_note' => ['nullable', 'max:255', 'string'],
        ];
    }
}

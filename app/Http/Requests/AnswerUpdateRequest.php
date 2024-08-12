<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnswerUpdateRequest extends FormRequest
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
            'question_id' => ['required', 'exists:questions,id'],
            'body' => ['required', 'max:255', 'string'],
            'score' => ['required', 'max:255'],
            'best_answer' => ['required', 'boolean'],
            'status' => ['required', 'in:published,pending,rejected'],
            'status_note' => ['nullable', 'max:255', 'string'],
        ];
    }
}

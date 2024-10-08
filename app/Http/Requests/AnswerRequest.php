<?php

namespace App\Http\Requests;

use App\Enums\AnswerStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AnswerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer'],
            'question_id' => ['required', 'integer'],
            'body' => ['required'],
            'score' => ['nullable', 'integer'],
            'best_answer' => ['nullable', 'boolean'],
            'status' => ['nullable', Rule::enum(AnswerStatus::class)],
            'status_note' => ['nullable', 'string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

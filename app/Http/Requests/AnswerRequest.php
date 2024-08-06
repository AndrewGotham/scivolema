<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnswerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer'],
            'question_id' => ['required', 'integer'],
            'body' => ['required'],
            'score' => ['required', 'integer'],
            'best_answer' => ['boolean'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

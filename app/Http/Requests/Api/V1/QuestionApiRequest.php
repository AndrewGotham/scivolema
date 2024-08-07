<?php

namespace App\Http\Requests\Api\V1;

use App\Enums\QuestionStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionApiRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'slug' => ['required'],
            'body' => ['required'],
            'views' => ['required', 'integer'],
            'score' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'language_id' => ['required', 'integer'],
            'status' => ['nullable', Rule::enum(QuestionStatus::class)],
            'status_note' => ['nullable', 'string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

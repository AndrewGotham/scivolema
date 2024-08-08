<?php

namespace App\Http\Requests\Api\V1;

use App\Enums\AnswerStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAnswerApiRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'body' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

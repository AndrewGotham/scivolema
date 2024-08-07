<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class VoteApiRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'votable' => ['required'],
            'user_id' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

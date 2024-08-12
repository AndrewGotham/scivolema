<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoteUpdateRequest extends FormRequest
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
            'upvote' => ['required', 'boolean'],
            'voteable_id' => ['required', 'max:255'],
            'voteable_type' => ['required', 'max:255', 'string'],
        ];
    }
}

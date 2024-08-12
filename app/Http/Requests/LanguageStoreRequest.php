<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class LanguageStoreRequest extends FormRequest
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
            'default' => ['required', 'boolean'],
            'fallback' => ['required', 'boolean'],
            'code' => [
                'required',
                'unique:languages,code',
                'max:255',
                'string',
            ],
            'regional' => ['nullable', 'max:255', 'string'],
            'script' => ['nullable', 'max:255', 'string'],
            'dir' => ['nullable', 'max:255', 'string'],
            'flag' => ['nullable', 'max:255', 'string'],
            'name' => ['required', 'max:255', 'string'],
            'english' => ['required', 'max:255', 'string'],
            'slug' => [
                'required',
                'unique:languages,slug',
                'max:255',
                'string',
            ],
            'available' => ['required', 'boolean'],
            'active' => ['required', 'boolean'],
        ];
    }
}

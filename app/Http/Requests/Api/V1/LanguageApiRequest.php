<?php

namespace App\Http\Requests\Api\V1;

class LanguageApiRequest
{
    public function rules()
    {
        return [
            'default' => ['boolean'],
            'fallback' => ['boolean'],
            'code' => ['required'],
            'regional' => ['nullable'],
            'script' => ['nullable'],
            'dir' => ['nullable'],
            'flag' => ['nullable'],
            'name' => ['required'],
            'english' => ['required'],
            'slug' => ['required'],
            'available' => ['boolean'],
            'active' => ['boolean'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

/** @mixin \App\Models\Language */
class LanguageResource
{
    public function toArray(Request $request)
    {
        return [
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id' => $this->id,
            'default' => $this->default,
            'fallback' => $this->fallback,
            'code' => $this->code,
            'regional' => $this->regional,
            'script' => $this->script,
            'dir' => $this->dir,
            'flag' => $this->flag,
            'name' => $this->name,
            'english' => $this->english,
            'slug' => $this->slug,
            'available' => $this->available,
            'active' => $this->active,
        ];
    }
}

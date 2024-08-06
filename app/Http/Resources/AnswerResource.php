<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Answer */
class AnswerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id' => $this->id,
            'user_id' => $this->user_id,
            'question_id' => $this->question_id,
            'body' => $this->body,
            'score' => $this->score,
            'best_answer' => $this->best_answer,
        ];
    }
}

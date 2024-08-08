<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

/** @mixin \App\Models\Answer */
class AnswerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'score' => $this->score . ' ' . Str::plural("vote", $this->score),
            'best_answer' => $this->best_answer,
            'created_at' => $this->created_at->diffForHumans(),
            'user' => new UserResource($this->whenLoaded('user')),
            'question' => new QuestionResource($this->whenLoaded('question')),
        ];
    }
}

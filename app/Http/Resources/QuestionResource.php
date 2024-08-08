<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

/** @mixin \App\Models\Question */
class QuestionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'body' => $this->body,
            'viewCount' => $this->views . ' ' . Str::plural("view", $this->views),
            'score' => $this->score . ' ' . Str::plural("vote", $this->score),
            'answerCount' => $this->answers()->count() . ' ' . Str::plural("answer", $this->answers()->count()),
            'answers' => AnswerResource::collection($this->whenLoaded('answers')),
            'user' => UserResource::make($this->whenLoaded('user')),
            'tags' => $this->tags,
            'created_at' => $this->created_at->diffForHumans(),

//            'user_id' => $this->user_id,
//            'language_id' => $this->language_id,
//            'created_at' => $this->created_at,
//            'updated_at' => $this->updated_at,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'avatar' => $this->avatarPath(),
//            'questionsCount' => $this->questions()->count(),
//            'answersCount' => $this->answers()->count(),
            'questionsCount' => $this->whenCounted('questions'),
            'questions' => QuestionResource::collection($this->whenLoaded('questions')),
            'answersCount' => $this->whenCounted('answers'),
            'answers' => AnswerResource::collection($this->whenLoaded('answers')),
//            'secret' => $this->when($request->user()->isAdmin(), 'secret-value'),
        ];
    }
}

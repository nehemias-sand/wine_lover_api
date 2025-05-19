<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'content' => $this->content,
            'banned' => $this->banned,
            'parent' => $this->parent->content,
            'review' => $this->review->title,
            'by' => $this->user->username,
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'banned' => $this->comments_available,
            'parent' => $this->parent->content,
            'review' => $this->review->title,
            'by' => $this->user->username,
        ];
    }
}

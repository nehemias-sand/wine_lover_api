<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'title' => $this->title,
            'content' => $this->content,
            'cover_image' => $this->cover_image,
            'comments_available' => $this->comments_available,
            'username' => $this->user->username,
            'comments' => $this->comments->map(fn($comment) => [
                'id' => $comment->id,
                'content' => $comment->content,
                'by' => $comment->user->username
            ])
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'cover_image' => $this->cover_image,
            'comments_available' => $this->comments_available,
            'username' => $this->user->username
        ];
    }
}

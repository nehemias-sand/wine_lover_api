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
        $user = auth()->user();

        $dataToSend = [
            'id' => $this->id,
            'title' => $this->title,
            'cover_image' => $this->cover_image,
            'created_at' => $this->created_at,
        ];

        if ($user && $user->profile_id === 3) {
            $dataToSend['content'] = $this->content;
            $dataToSend['comments_available'] = $this->comments_available;
            $dataToSend['username'] = $this->user->username;
            $dataToSend['comments'] = $this->comments->map(fn($comment) => new CommentResource($comment));
        }

        return $dataToSend;
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'cover_image' => $this->cover_image,
            'comments_available' => $this->comments_available,
            'username' => $this->user->username,
            'comments' => $this->comments->map(fn($comment) => new CommentResource($comment)),
            'created_at' => $this->created_at,
        ];
    }
}

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
            'banned'=>$this->banned,
            'parent_id'=>$this->parent_id,
            'review_id'=>$this->review->title
        ];
    }

    public function toJson($options = 0)
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'banned' => $this->comments_available,
            'parent_id'=>$this->comment->parent_id,
            'review_id'=>$this->review->title
        ];
    }
}

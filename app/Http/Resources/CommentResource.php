<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'body'=>$this->body,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user'=>new UserResource($this->user),
            'post'=>new PostResource($this->post )

            
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public $preserveKeys = true;
    public function toArray($request)
    {
        return [
            'status' => true,
            'code' => 200,
            'author' => $this->author,
            'data' => [
                'id' => $this->id,
                'title' => $this->title,
                'iamge' => $this->image,
                'content' => $this->content
            ]

        ];
    }
}

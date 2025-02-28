<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleRevisionResource extends JsonResource
{
    public static $wrap = 'revision';

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'articleId' => $this->article_id,
            'articleData' =>[
                'slug' => $this->data['slug'],
                'title' => $this->data['title'],
                'description' => $this->data['description'],
                'body' => $this->data['body'],
                'user_id' => $this->data['user_id'],
                'createdAt' => $this->data['created_at'],
                'updatedAt' => $this->data['updated_at'],
            ],
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}

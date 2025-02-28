<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ArticleRevisionCollection extends ResourceCollection
{
    public static $wrap = 'revisions';

    public function toArray($request): array
    {
        return [
            'articlesRevisions' => $this->collection,
            'articlesRevisionsCount' => $this->count()
        ];
    }
}

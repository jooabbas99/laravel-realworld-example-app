<?php

namespace App\Observers;

use App\Models\Article;
use App\Models\ArticleRevision;
use Tymon\JWTAuth\Contracts\Providers\Auth;

class ArticleObserver
{


    /**
     * Handle the Article "updating" event.
     */

    public function updating(Article $article): void
    {
        ArticleRevision::create([
            'article_id' => $article->id,
            'data' => $article->getOriginal(),
            'user_id' => auth()->id() ?? $article->user_id,
        ]);
    }




}

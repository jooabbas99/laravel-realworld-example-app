<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticleRevisionCollection;
use App\Http\Resources\ArticleRevisionResource;
use App\Models\Article;
use App\Models\ArticleRevision;
use Illuminate\Http\Request;

class ArticleRevisionController extends Controller
{
    //


    public function index(Article $article)
    {
        $revisions = $article->revisions()->get();

        return new ArticleRevisionCollection($revisions);
    }

    public function show(Article $article, $revisionId)
    {
        $revision = $article->revisions()->findOrFail($revisionId);
        return $this->articleRevisionResponse($revision);
    }

    public function revert(Article $article ,$revisionId, Request $request)
    {
        // check  if the authenticated user is the owner of the article

        $revision = $article->revisions()->findOrFail($revisionId);
        $article->update($revision->data);
        $revision->delete();
        return new ArticleResource($article->refresh());
    }


    protected function articleRevisionResponse(ArticleRevision $revision): ArticleRevisionResource
    {
        return new ArticleRevisionResource($revision);
    }

}

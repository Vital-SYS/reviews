<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article\Article;

class LikeStoreController extends Controller
{
    public function __invoke(Article $article)
    {
        auth()->user()->likedArticles()->toggle($article->id);

        return redirect()->back();
    }
}

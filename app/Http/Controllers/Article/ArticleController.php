<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article\Article;
use Carbon\Carbon;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(6);
        $randomArticles = Article::get()->random(4);
        $likedArticles = Article::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);

        return view('articles', compact('articles', 'randomArticles', 'likedArticles'));
    }

    public function show(Article $article)
    {
        $date = Carbon::parse($article->created_at);
        return view('article.show', compact('article', 'date'));
    }
}

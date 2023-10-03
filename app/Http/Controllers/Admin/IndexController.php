<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article\Article;
use App\Models\Review\Review;
use App\Models\Review\ReviewCategory;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data['usersCount'] = User::all()->count();
        $data['reviewCount'] = Review::all()->count();
        $data['articleCount'] = Article::all()->count();
        $data['categoriesCount'] = ReviewCategory::all()->count();
        return view('admin.index', compact('data'));
    }
}

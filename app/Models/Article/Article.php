<?php

namespace App\Models\Article;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($article) {
            $article->slug = Str::slug($article->title);
        });
    }

    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'article_user_likes', 'article_id', 'user_id');
    }
}

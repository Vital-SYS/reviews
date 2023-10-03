<?php

namespace App\Models;

use App\Models\Article\Article;
use App\Models\Review\Review;
use App\Models\Review\ReviewComment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMIN = 0;
    const ROLE_READER = 1;

    public static function getRoles()
    {
        return [
            self::ROLE_ADMIN => 'Админ',
            self::ROLE_READER => 'Читатель',
        ];
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function likedReviews()
    {
        return $this->belongsToMany(Review::class, 'review_user_likes', 'user_id', 'review_id');
    }

    public function comments()
    {
        return $this->hasMany(ReviewComment::class, 'user_id', 'id');
    }

    public function likedArticles()
    {
        return $this->belongsToMany(Article::class, 'article_user_likes', 'user_id', 'article_id');
    }
}


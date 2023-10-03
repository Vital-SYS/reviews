<?php

namespace App\Models\Review;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Review extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($review) {
            $review->slug = Str::slug($review->title);
        });
    }

    public function category()
    {
        return $this->belongsTo(ReviewCategory::class, 'category_id', 'id');
    }

    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'review_user_likes', 'review_id', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(ReviewComment::class, 'review_id', 'id');
    }
}

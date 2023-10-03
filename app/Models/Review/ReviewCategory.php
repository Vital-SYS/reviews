<?php

namespace App\Models\Review;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ReviewCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($reviewCategory) {
            $reviewCategory->slug = Str::slug($reviewCategory->title);
        });
    }
}

<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Models\Review\Review;

class LikeStoreController extends Controller
{
    public function __invoke(Review $review)
    {
        auth()->user()->likedReviews()->toggle($review->id);

        return redirect()->back();
    }
}

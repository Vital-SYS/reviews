<?php

namespace App\Http\Controllers\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Review\Review;

class CommentStoreController extends Controller
{
    public function __invoke(Review $review, StoreRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['review_id'] = $review->id;

        Comment::create($data);

        return redirect()->route('review.show', $review->id);
    }
}

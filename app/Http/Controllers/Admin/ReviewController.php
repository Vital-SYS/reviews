<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageSaver;
use App\Http\Controllers\Controller;
use App\Http\Requests\Review\StoreRequest;
use App\Http\Requests\Review\UpdateRequest;
use App\Models\Review\Review;
use App\Models\Review\ReviewCategory;

class ReviewController extends Controller
{
    public $service;

    /**
     * @param $service
     */
    public function __construct(ImageSaver $imageSaver)
    {
        $this->imageSaver = $imageSaver;
    }


    public function index()
    {
        $reviews = Review::all();

        return view('admin.review.index', compact('reviews'));
    }

    public function store(StoreRequest $request)
    {
        $request->merge([
            'verified' => $request->has('verified'),
            'anonymous' => $request->has('anonymous'),
            'trustee' => $request->has('trustee'),
        ]);
        $data = $request->all();
        $data['image'] = $this->imageSaver->upload($request, null, 'review');
        $review = Review::create($data);

        return redirect()
            ->route('admin.review.show', ['review' => $review->id])
            ->with('success', 'Новый отзыв успешно создан');
    }

    public function create()
    {
        $categories = ReviewCategory::all();
        return view('admin.review.create', compact('categories'));
    }

    public function show(Review $review)
    {
        return view('admin.review.show', compact('review'));
    }

    public function edit(Review $review)
    {
        $categories = ReviewCategory::all();
        return view('admin.review.edit', compact('review', 'categories'));
    }

    public function update(UpdateRequest $request, Review $review)
    {
        $request->merge([
            'verified' => $request->has('verified'),
            'anonymous' => $request->has('anonymous'),
            'trustee' => $request->has('trustee'),
        ]);
        $data = $request->all();
        $data['image'] = $this->imageSaver->upload($request, $review, 'review');
        $review->update($data);

        return redirect()
            ->route('admin.review.show', ['review' => $review->id])
            ->with('success', 'Отзыв был успешно обновлен');
    }

    public function destroy(Review $review)
    {
        $this->imageSaver->remove($review, 'review');
        $review->delete();

        return redirect()
            ->route('admin.review.index')
            ->with('success', 'Отзыв успешно удален');
    }
}

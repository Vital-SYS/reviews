<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReviewCategory\StoreRequest;
use App\Http\Requests\Admin\ReviewCategory\UpdateRequest;
use App\Models\Review\ReviewCategory;

class ReviewCategoryController extends Controller
{
    public function index()
    {
        $categories = ReviewCategory::all();
        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        $categories = ReviewCategory::all();
        return view('admin.category.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->all();
        $category = ReviewCategory::create($data);

        return redirect()
            ->route('admin.category.show', ['category' => $category->id])
            ->with('success', 'Новая категория успешно создана');
    }

    public function show(ReviewCategory $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function edit(ReviewCategory $category)
    {
        $categories = ReviewCategory::all();
        return view('admin.category.edit', compact('category'));
    }

    public function update(UpdateRequest $request, ReviewCategory $category)
    {
        $data = $request->all();
        $category->update($data);

        return redirect()
            ->route('admin.category.show', ['category' => $category->id])
            ->with('success', 'Категория была успешно исправлена');
    }

    public function destroy(ReviewCategory $category)
    {
        if (!empty($errors)) {
            return back()->withErrors($errors);
        }
        $category->delete();

        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Категория каталога успешно удалена');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageSaver;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Article\StoreRequest;
use App\Http\Requests\Admin\Article\UpdateRequest;
use App\Models\Article\Article;

class ArticleController extends Controller
{
    public $service;
    private $imageSaver;

    /**
     * @param $service
     */
    public function __construct(ImageSaver $imageSaver)
    {
        $this->imageSaver = $imageSaver;
    }


    public function index()
    {
        $articles = Article::all();

        return view('admin.article.index', compact('articles'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->all();
        $data['image'] = $this->imageSaver->upload($request, null, 'article');
        $article = Article::create($data);

        return redirect()
            ->route('admin.article.show', ['article' => $article->id])
            ->with('success', 'Новая статья успешно создана');
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function show(Article $article)
    {
        return view('admin.article.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('admin.article.edit', compact('article'));
    }

    public function update(UpdateRequest $request, Article $article)
    {
        $data = $request->all();
        $data['image'] = $this->imageSaver->upload($request, $article, 'article');
        $article->update($data);

        return redirect()
            ->route('admin.article.show', ['article' => $article->id])
            ->with('success', 'Статья была успешно обновлена');
    }

    public function destroy(Article $article)
    {
        $this->imageSaver->remove($article, 'article');
        $article->delete();

        return redirect()
            ->route('admin.article.index')
            ->with('success', 'Статья успешно удалена');
    }
}

@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h1 class="m-0">Просмотр статьи</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                            <li class="breadcrumb-item "><a href="{{route('admin.article.index')}}">Статьи</a></li>
                            <li class="breadcrumb-item active">{{$article->title}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <table class="table table-bordered mb-5">
                    <tr class="text-center">
                        <th>#</th>
                        <th width="20%">Название</th>
                        <th width="40%">Описание</th>
                        <th width="20%">Slug</th>
                    </tr>
                        <tr class="text-center">
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->content }}</td>
                            <td>{{ $article->slug }}</td>
                        </tr>
                </table>
                <table class="table table-bordered mb-5">
                    <th>Изображение</th>
                    <td>
                        <div class="col-md-6 mb-3 offset-md-3">
                            @php
                                if ($article->image) {
                                    $url = url('storage/catalog/article/image/' . $article->image);
                                } else {
                                    $url = url('storage/catalog/article/image/default.jpg');
                                }
                            @endphp
                            <img src="{{ $url }}" alt="" class="img-fluid">
                        </div>
                    </td>
                </table>
                <a href="{{ route('admin.article.edit', ['article' => $article->id]) }}"
                   class="btn btn-outline-primary me-2">
                    Редактировать статью
                </a>
                <form method="post" class="d-inline"
                      action="{{ route('admin.article.destroy', ['article' => $article->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">
                        Удалить статью
                    </button>
                </form>
            </div>
        </section>
@endsection

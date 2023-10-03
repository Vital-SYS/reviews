@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Статьи</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Статьи</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2 mb-3">
                        <a href="{{route('admin.article.create')}}" type="button"
                           class="btn btn-block btn-outline-primary">Добавить статью</a>
                    </div>
                </div>
                <table class="table table-bordered">
                    <tr class="text-center">
                        <th>#</th>
                        <th width="20%">Название</th>
                        <th width="40%">Описание</th>
                        <th width="20%">Slug</th>
                        <th><i class="fas fa-eye"></i></th>
                        <th><i class="fas fa-edit"></i></th>
                        <th><i class="fas fa-trash"></i></th>
                    </tr>
                    @foreach($articles as $article)
                        <tr class="text-center">
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ strip_tags($article->content) }}</td>
                            <td>{{ ($article->slug) }}</td>
                            <td>
                                <a href="{{ route('admin.article.show', ['article' => $article->id]) }}">
                                    <i class="far fa-eye"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.article.edit', ['article' => $article->id]) }}">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form class="ml-3" action="{{route('admin.article.destroy', $article->id)}}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border-0 bg-transparent">
                                        <i class="fas fa-trash-alt text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </section>
    </div>
@endsection

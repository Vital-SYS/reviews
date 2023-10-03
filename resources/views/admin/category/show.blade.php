@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h1 class="m-0">Просмотр категории</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                            <li class="breadcrumb-item "><a href="{{route('admin.category.index')}}">Категории</a></li>
                            <li class="breadcrumb-item active">{{$category->title}}</li>
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
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->content }}</td>
                            <td>{{ $category->slug }}</td>
                        </tr>
                </table>
                <a href="{{ route('admin.category.edit', ['category' => $category->id]) }}"
                   class="btn btn-outline-primary me-2">
                    Редактировать категорию
                </a>
                <form method="post" class="d-inline"
                      action="{{ route('admin.category.destroy', ['category' => $category->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">
                        Удалить категорию
                    </button>
                </form>
            </div>
        </section>
@endsection

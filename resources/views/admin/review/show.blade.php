@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h1 class="m-0">Просмотр отзыва</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                            <li class="breadcrumb-item "><a href="{{route('admin.review.index')}}">Отзывы</a></li>
                            <li class="breadcrumb-item active">{{$review->title}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <table class="table table-bordered table-striped mb-5">
                    <tr class="text-center">
                        <th>#</th>
                        <th width="20%">Название</th>
                        <th width="40%">Описание</th>
                        <th width="20%">Slug</th>
                        <th width="10%">Категория</th>
                        <th>Проверенный</th>
                        <th>Анонимный</th>
                        <th>Доверительный</th>
                    </tr>
                    <tr class="text-center">
                        <td>{{ $review->id }}</td>
                        <td>{{ $review->title }}</td>
                        <td>{{ $review->content }}</td>
                        <td>{{ $review->slug }}</td>
                        <td>{{ $review->category->title }}</td>
                        <td><p>@if($review->verified) да @else нет @endif</p></td>
                        <td><p>@if($review->anonymous) да @else нет @endif</p></td>
                        <td><p>@if($review->trustee) да @else нет @endif</p></td>
                    </tr>
                </table>
                <table class="table table-bordered mb-5">
                    <th>Изображение</th>
                    <td>
                        <div class="col-md-6 mb-3 offset-md-3">
                            @php
                                if ($review->image) {
                                    $url = url('storage/catalog/review/image/' . $review->image);
                                } else {
                                    $url = url('storage/catalog/review/image/default.jpg');
                                }
                            @endphp
                            <img src="{{ $url }}" alt="" class="img-fluid">
                        </div>
                    </td>
                </table>
                <a href="{{ route('admin.review.edit', ['review' => $review->id]) }}"
                   class="btn btn-outline-primary me-2">
                    Редактировать отзыв
                </a>
                <form method="post" class="d-inline"
                      action="{{ route('admin.review.destroy', ['review' => $review->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">
                        Удалить отзыв
                    </button>
                </form>
            </div>
        </section>
@endsection

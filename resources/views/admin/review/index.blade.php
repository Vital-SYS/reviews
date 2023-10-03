@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Отзывы</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Отзывы</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2 mb-3">
                        <a href="{{route('admin.review.create')}}" type="button"
                           class="btn btn-block btn-outline-primary">Добавить отзыв</a>
                    </div>
                </div>
                <table class="table table-bordered">
                    <tr class="text-center">
                        <th>#</th>
                        <th width="20%">Название</th>
                        <th width="40%">Описание</th>
                        <th width="20%">Категория</th>
                        <th><i class="fas fa-eye"></i></th>
                        <th><i class="fas fa-edit"></i></th>
                        <th><i class="fas fa-trash"></i></th>
                    </tr>
                    @foreach($reviews as $review)
                        <tr class="text-center">
                            <td>{{ $review->id }}</td>
                            <td>{{ $review->title }}</td>
                            <td>{{ strip_tags($review->content) }}</td>
                            <td>{{ $review->category->title }}</td>
                            <td>
                                <a href="{{ route('admin.review.show', ['review' => $review->id]) }}">
                                    <i class="far fa-eye"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.review.edit', ['review' => $review->id]) }}">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form class="ml-3" action="{{route('admin.review.destroy', $review->id)}}"
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

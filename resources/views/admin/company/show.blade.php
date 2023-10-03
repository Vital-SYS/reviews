@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h1 class="m-0">Просмотр компании</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                            <li class="breadcrumb-item "><a href="{{route('admin.company.index')}}">Компании</a></li>
                            <li class="breadcrumb-item active">{{$company->title}}</li>
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
                        <th width="10%">Slug</th>
                        <th width="10%">Телефон</th>
                        <th width="10%">Почта</th>
                        <th width="10%">Сайт</th>
                    </tr>
                        <tr class="text-center">
                            <td>{{ $company->id }}</td>
                            <td>{{ $company->title }}</td>
                            <td>{{ $company->content }}</td>
                            <td>{{ $company->slug }}</td>
                            <td>{{ $company->phone }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->site }}</td>
                        </tr>
                </table>
                <table class="table table-bordered mb-5">
                    <th>Изображение</th>
                    <td>
                        <div class="col-md-6 mb-3 offset-md-3">
                            @php
                                if ($company->image) {
                                    $url = url('storage/catalog/company/image/' . $company->image);
                                } else {
                                    $url = url('storage/catalog/company/image/default.jpg');
                                }
                            @endphp
                            <img src="{{ $url }}" alt="" class="img-fluid">
                        </div>
                    </td>
                </table>
                <a href="{{ route('admin.company.edit', ['company' => $company->id]) }}"
                   class="btn btn-outline-primary me-2">
                    Редактировать компанию
                </a>
                <form method="post" class="d-inline"
                      action="{{ route('admin.company.destroy', ['company' => $company->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">
                        Удалить компанию
                    </button>
                </form>
            </div>
        </section>
@endsection

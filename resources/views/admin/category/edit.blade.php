@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование категории</h1>
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
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('admin.category.update', $category->id)}}" method="POST" class="w-50"   enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label>Название категории</label>
                                    <input type="text" class="form-control" name="title"
                                           placeholder="Название категории" value="{{$category->title}}">
                                    @error('title')
                                    <div class="text-danger">Это поле необходимо для заполнения</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Описание категории</label>
                                    <input type="text" class="form-control" name="content"
                                           placeholder="Описание категории" value="{{$category->content}}">
                                    @error('content')
                                    <div class="text-danger">Это поле необходимо для заполнения</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Обновить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

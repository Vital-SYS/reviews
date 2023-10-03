@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование статьи</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                            <li class="breadcrumb-item "><a href="{{route('admin.article.index')}}">Категории</a></li>
                            <li class="breadcrumb-item active">{{$article->title}}</li>
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
                        <form action="{{route('admin.article.update', $article->id)}}" method="POST" class="w-50"   enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label>Название статьи</label>
                                    <input type="text" class="form-control" name="title"
                                           placeholder="Название статьи" value="{{$article->title}}">
                                    @error('title')
                                    <div class="text-danger">Это поле необходимо для заполнения</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Описание статьи</label>
                                    <textarea id="summernote" class="form-control" name="content" rows="5"
                                              placeholder="Описание статьи">{{$article->content}}</textarea>
                                    @error('content')
                                    <div class="text-danger">Это поле необходимо для заполнения</div>
                                    @enderror
                                </div>
                                <div class="form-group w-50 pb-5">
                                    <label for="exampleInputFile">Добавить  изображение</label>
                                    <div class="w-50 mb-2">
                                        <div class="col-md-6 mb-3">
                                            @php
                                                if ($article->image) {
                                                    $url = url('storage/catalog/article/image/' . $article->image);
                                                } else {
                                                    $url = url('storage/catalog/article/image/default.jpg');
                                                }
                                            @endphp
                                            <img src="{{ $url }}" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image">
                                        </div>
                                    </div>
                                    @error('image')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-outline-primary">Обновить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

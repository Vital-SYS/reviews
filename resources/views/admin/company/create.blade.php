@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            Добавление компании
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Добавление компании</li>
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
                        <form action="{{route('admin.company.store')}}" method="POST" class="w-50" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group w-50 pb-3">
                                    <label>Название компании</label>
                                    <input type="text" class="form-control" name="title" placeholder="Название статьи"
                                           value="{{old('title')}}">
                                    @error('title')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group pb-3">
                                    <label>Описание компании</label>
                                    <textarea class="form-control" name="content" rows="5"
                                              placeholder="Описание компании"></textarea>
                                    @error('content')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group w-50 pb-3">
                                    <label>Телефон</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Телефон"
                                           value="{{old('title')}}">
                                    @error('title')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group w-50 pb-3">
                                    <label>Электронная почта</label>
                                    <input type="text" class="form-control" name="email" placeholder="Электронная почта"
                                           value="{{old('title')}}">
                                    @error('title')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group w-50 pb-3">
                                    <label>Сайт компании</label>
                                    <input type="text" class="form-control" name="site" placeholder="Сайт компании"
                                           value="{{old('title')}}">
                                    @error('title')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group w-50 pb-5">
                                    <label for="exampleInputFile">Добавить изображение</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image">
                                        </div>
                                    </div>
                                    @error('image')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-outline-primary" value="Добавить">
                                </div>
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

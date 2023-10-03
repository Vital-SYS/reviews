@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование компании</h1>
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
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('admin.company.update', $company->id)}}" method="POST" class="w-50" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label>Название компании</label>
                                    <input type="text" class="form-control" name="title"
                                           placeholder="Название категории" value="{{$company->title}}">
                                    @error('title')
                                    <div class="text-danger">Это поле необходимо для заполнения</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Описание компании</label>
                                    <textarea id="summernote" class="form-control" name="content" rows="5"
                                              placeholder="Описание отзыва">{{$company->content}}</textarea>
                                    @error('content')
                                    <div class="text-danger">Это поле необходимо для заполнения</div>
                                    @enderror
                                </div>
                                <div class="form-group w-50 pb-3">
                                    <label>Телефон</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Телефон" value="{{$company->phone}}">
                                    @error('phone')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group w-50 pb-3">
                                    <label>Электронная почта</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{$company->email}}">
                                    @error('email')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group w-50 pb-3">
                                    <label>Сайт</label>
                                    <input type="text" class="form-control" name="site" placeholder="Сайт" value="{{$company->site}}">
                                    @error('site')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group w-50 pb-5">
                                    <label for="exampleInputFile">Добавить изображение</label>
                                    <div class="col-md-6 mb-3">
                                        @php
                                            if ($company->image) {
                                                $url = url('storage/catalog/company/image/' . $company->image);
                                            } else {
                                                $url = url('storage/catalog/company/image/default.jpg');
                                            }
                                        @endphp
                                        <img src="{{ $url }}" alt="" class="img-fluid">
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
                                <div class="form-group">
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

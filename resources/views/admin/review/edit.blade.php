@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование отзыва</h1>
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
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('admin.review.update', $review->id)}}" method="POST" class="w-50"   enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label>Название Статьи</label>
                                    <input type="text" class="form-control" name="title"
                                           placeholder="Название статьи" value="{{$review->title}}">
                                    @error('title')
                                    <div class="text-danger">Это поле необходимо для заполнения</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Описание статьи</label>
                                    <textarea id="summernote" class="form-control" name="content" rows="5"
                                              placeholder="Описание статьи">{{$review->content}}</textarea>
                                    @error('content')
                                    <div class="text-danger">Это поле необходимо для заполнения</div>
                                    @enderror
                                </div>
                                <div class="form-group w-50 pb-4">
                                    <label>Выберите категорию</label>
                                    <select name="category_id" class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                                {{$category->id == old('$category_id') ? 'selected' : ""}}
                                            >{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group w-50 pb-5">
                                    <label for="exampleInputFile">Добавить изображение</label>
                                    <div class="col-md-6 mb-3">
                                        @php
                                            if ($review->image) {
                                                $url = url('storage/catalog/review/image/' . $review->image);
                                            } else {
                                                $url = url('storage/catalog/review/image/default.jpg');
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
                                <div class="form-group pb-3">
                                    <!-- Проверенный -->
                                    <div class="form-check form-check-inline">
                                        @php
                                            $checked = false; // создание нового товара
                                            if (isset($review)) $checked = $review->verified; // редактирование товара
                                            if (old('verified')) $checked = true; // были ошибки при заполнении формы
                                        @endphp
                                        <input type="checkbox" name="verified" class="form-check-input"
                                               id="verified-review"
                                               @if($review->verified) checked @endif value="1">
                                        <label class="form-check-label" for="verified-review">Проверенный отзыв</label>
                                    </div>
                                    <!-- Анонимный -->
                                    <div class="form-check form-check-inline">
                                        @php
                                            $checked = false; // создание нового товара
                                            if (isset($review)) $checked = $review->anonymous; // редактирование товара
                                            if (old('anonymous')) $checked = true; // были ошибки при заполнении формы
                                        @endphp
                                        <input type="checkbox" name="anonymous" class="form-check-input"
                                               id="anonymous-review"
                                               @if($review->anonymous) checked @endif value="1">
                                        <label class="form-check-label" for="anonymous-review">Анонимный отзыв</label>
                                    </div>
                                    <!-- Доверительный -->
                                    <div class="form-check form-check-inline">
                                        @php
                                            $checked = false; // создание нового товара
                                            if (isset($review)) $checked = $review->trustee; // редактирование товара
                                            if (old('trustee')) $checked = true; // были ошибки при заполнении формы
                                        @endphp
                                        <input type="checkbox" name="trustee" class="form-check-input"
                                               id="trustee-review"
                                               @if($review->trustee) checked @endif value="1">
                                        <label class="form-check-label" for="trustee-review">Доверительный отзыв</label>
                                    </div>
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

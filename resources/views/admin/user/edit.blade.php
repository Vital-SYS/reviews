@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование пользователя</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Пользователи</a></li>
                            <li class="breadcrumb-item active">{{ $user->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('admin.user.update', $user->id)}}" method="POST" class="w-50">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label>Имя пользователя</label>
                                    <input type="text" class="form-control" name="name" placeholder="Имя пользователя"
                                           value="{{$user->name}}">
                                    @error('name')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                           value="{{$user->email}}">
                                    @error('email')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group w-50 mb-3">
                                    <label>Выберите роль</label>
                                    <select name="role" class="form-control select2 select2-hidden-accessible"
                                            style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        @foreach($roles as $id => $role)
                                            <option value="{{$id}}"
                                                {{$id == old('$role_id') ? 'selected' : ''}}
                                            >{{$role}}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <input type="hidden" name="user_id" value="{{$user->id}}">
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

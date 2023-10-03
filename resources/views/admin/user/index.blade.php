@extends('admin.layouts.main', ['title' => 'Все пользователи'])

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Пользователи</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Пользователи</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <table class="table table-bordered">
                <tr class="text-center">
                    <th>#</th>
                    <th width="15%">Дата регистрации</th>
                    <th width="20%">Дата последнего изменения</th>
                    <th width="25%">Имя, фамилия</th>
                    <th width="20%">Адрес почты</th>
                    <th width="10%">Роль</th>
                    <th><i class="fas fa-edit"></i></th>
                    <th><i class="fas fa-trash"></i></th>
                </tr>
                @foreach($users as $user)
                    <tr class="text-center">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->created_at->setTimezone('Europe/Moscow')->format('d.m.Y H:i') }}</td>
                        <td>{{ $user->updated_at->setTimezone('Europe/Moscow')->format('d.m.Y H:i') }}</td>
                        <td>{{ $user->name }}</td>
                        <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                        <td>{{$user->getRoles()[$user->role]}}</td>
                        <td>
                            <a href="{{ route('admin.user.edit', ['user' => $user->id]) }}">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{route('admin.user.destroy', $user->id)}}" method="POST">
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
        </div><!-- /.container-fluid -->
    </section>
@endsection

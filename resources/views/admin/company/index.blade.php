@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Компании</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">Компании</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-2 mb-3">
                        <a href="{{route('admin.company.create')}}" type="button"
                           class="btn btn-block btn-outline-primary">Добавить компанию</a>
                    </div>
                </div>
                <table class="table table-bordered">
                    <tr class="text-center">
                        <th>#</th>
                        <th width="20%">Название</th>
                        <th width="30%">Описание</th>
                        <th width="15%">Почта</th>
                        <th width="15%">Телефон</th>
                        <th><i class="fas fa-eye"></i></th>
                        <th><i class="fas fa-edit"></i></th>
                        <th><i class="fas fa-trash"></i></th>
                    </tr>
                    @foreach($companies as $company)
                        <tr class="text-center">
                            <td>{{ $company->id }}</td>
                            <td>{{ $company->title }}</td>
                            <td>{{ strip_tags($company->content) }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->phone }}</td>
                            <td>
                                <a href="{{ route('admin.company.show', ['company' => $company->id]) }}">
                                    <i class="far fa-eye"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.company.edit', ['company' => $company->id]) }}">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form class="ml-3" action="{{route('admin.company.destroy', $company->id)}}"
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

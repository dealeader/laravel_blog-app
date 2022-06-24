@extends('admin.layouts.base')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Категория "{{ $category->title }}"</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Основная информация</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.categories') }}">Категории</a></li>
                            <li class="breadcrumb-item active">{{ $category->title }}</li>
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
                    <div class="d-flex align-items-center m-3">
                        <a class="mr-3" href="{{ route('admin.categories.edit', $category->id) }}">
                            <i class="fa-solid fa-eye text-warning"></i>
                        </a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-transparent border-0">
                                <i class="fa-solid fa-eye text-danger" role="button"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <tbody>
                                <tr>
                                    <td>Название:</td>
                                    <td>{{ $category->title }}</td>
                                </tr>
                                <tr>
                                    <td>Еще что-то:</td>
                                    <td>{{ 123}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

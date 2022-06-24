@extends('admin.layouts.base')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Пост "{{ $post->title }}"</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Основная информация</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.posts') }}">Посты</a></li>
                            <li class="breadcrumb-item active">{{ $post->title }}</li>
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
                        <a class="mr-3" href="{{ route('admin.posts.edit', $post->id) }}">
                            <i class="fa-solid fa-eye text-warning"></i>
                        </a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
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
                                <td>{{ $post->title }}</td>
                            </tr>
                            <tr>
                                <td>Содержание</td>
                                <td>{{ $post->content }}</td>
                            </tr>
                            <tr>
                                <td>Создатель</td>
                                <td>{{ $post->user_id }}</td>
                            </tr>
                            <tr>
                                <td>Лайки</td>
                                <td>{{ $post->likes }}</td>
                            </tr>
                            <tr>
                                <td>Превью</td>
                                <td>{{ $post->preview_image }}</td>
                            </tr>
                            <tr>
                                <td>Основное фото</td>
                                <td>{{ $post->main_image }}</td>
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

@extends('admin.layouts.base')

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
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Основная информация</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Пользователи</a></li>
                            <li class="breadcrumb-item active">{{ $user->id }}</li>
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
                    <div class="col-6 ml-auto mr-auto pt-2">
                        <div class="card card-primary ">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                <div class="card-body">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <div class="form-group">
                                        <label for="userName">Имя пользователя</label>
                                        <input type="text" name="name" class="form-control" id="userName" value="{{ $user->name }}">
                                        @error('name')
                                        <div class="text-danger pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="userEmail">Email</label>
                                        <input type="email" name="email" class="form-control" id="userEmail" value="{{ $user->email }}">
                                        @error('email')
                                        <div class="text-danger pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Роль пользователя</label>
                                        <select class="form-control" name="role">
                                            @foreach($roles as $id => $role)
                                                <option value="{{ $id }}"
                                                    {{ $id == $user->role ? ' selected' : '' }}
                                                >{{ $role }}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                        <div class="text-danger pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Редактировать</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

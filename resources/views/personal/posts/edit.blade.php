@extends('admin.layouts.base')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование поста</h1>
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
                    <div class="col-6 ml-auto mr-auto pt-2">
                        <div class="card card-primary ">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label for="postTitle">Заголовок</label>
                                        <input type="text" name="title" class="form-control" id="postTitle" value="{{ $post->title }}">
                                        @error('title')
                                        <div class="text-danger pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="summernote">Содержание</label>
                                        <textarea id="summernote" name="content">
                                            {{ $post->content }}
                                        </textarea>
                                        @error('content')
                                        <div class="text-danger pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Превью-изображение</label>
                                        <div class="w-25">
                                            <img src="{{ url('storage/' . $post->preview_image) }}" alt="preview" class="w-50">
                                        </div>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="preview_image" class="custom-file-input" id="previewImage">
                                                <label class="custom-file-label" for="previewImage">Выбрать</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Загрузить</span>
                                            </div>
                                            @error('preview_image')
                                            <div class="text-danger pt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Основное изображение</label>
                                        <div class="w-25">
                                            <img src="{{ url('storage/' . $post->main_image) }}" alt="main" class="w-50">
                                        </div>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="main_image" class="custom-file-input" id="mainImage">
                                                <label class="custom-file-label" for="mainImage">Выбрать</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Загрузить</span>
                                            </div>
                                        </div>
                                        @error('main_image')
                                        <div class="text-danger pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Категория поста</label>
                                        <select class="form-control" name="category_id">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $post->category_id ? ' selected' : '' }}
                                                >{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div class="text-danger pt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group" data-select2-id="29">
                                        <label>Теги</label>
                                        <select name="tag_ids[]" class="select2 select2-hidden-accessible" multiple="" data-placeholder="Выберите теги" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                            @foreach($tags as $tag)
                                                <option {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : '' }}
                                                        value="{{ $tag->id }}">{{ $tag->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('tag_ids[]')
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

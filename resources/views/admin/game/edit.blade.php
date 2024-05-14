@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование игры</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
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
                        <form action="{{ route('admin.game.update', $game->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25">
                                <input type="text" class="form-control" name="title" placeholder="Название игры"
                                value="{{ $game->title }}">
                                @error('title')
                                <div class="text-danger">Это поле необходимо для заполнения</div>
                                @enderror
                            </div>

                            <div class="form-group w-50">
                                <textarea id="summernote" name="description">
                                    {{ $game->description }}
                                </textarea>
                                @error('description')
                                <div class="text-danger">Это поле необходимо для заполнения</div>
                                @enderror
                            </div>

                            <div class="form-group w-50">
                                <label for="exampleInputFile">Добавить главное изображение</label>
                                <div class="mb-2">
                                    <img src="{{ asset($game->main_image) }}" alt="preview_image" class="w-50">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="main_image">
                                        <label class="custom-file-label">Выберите изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузка</span>
                                    </div>
                                </div>
                                @error('main_image')
                                <div class="text-danger">Это поле необходимо для заполнения</div>
                                @enderror
                            </div>

                            <div class="form-group w-50">
                                <label>Жанры</label>
                                <select class="select2" name="genre_ids[]" multiple="multiple" data-placeholder="Выберите жанры" style="width: 100%;">
                                    @foreach($genres as $genre)
                                        <option {{ is_array( $game->genres->pluck('id')->toArray() ) && in_array( $genre->id, $game->genres->pluck('id')->toArray() ) ? 'selected' : '' }} value="{{ $genre->id }}">{{ $genre->title }}</option>
                                    @endforeach
                                </select>
                                @error('genre_ids')
                                <div class="text-danger">Это поле необходимо для заполнения</div>
                                @enderror
                            </div>

                            <div class="form-group w-50">
                                <label>Платформы</label>
                                <select class="select2" name="platform_ids[]" multiple="multiple" data-placeholder="Выберите платформы" style="width: 100%;">
                                    @foreach($platforms as $platform)
                                        <option {{ is_array( $game->platforms->pluck('id')->toArray() ) && in_array( $platform->id, $game->platforms->pluck('id')->toArray() ) ? 'selected' : '' }} value="{{ $platform->id }}">{{ $platform->title }}</option>
                                    @endforeach
                                </select>
                                @error('platform_ids')
                                <div class="text-danger">Это поле необходимо для заполнения</div>
                                @enderror
                            </div>

                            <div class="form-group w-25">
                                <label>Цена</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control" name="price" value="{{ $game->price }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                                @error('price')
                                    <div class="text-danger">Это поле необходимо для заполнения</div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-primary" value="Обновить">
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

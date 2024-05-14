@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-3">{{ $game->title }}</h1>
                        <a href="{{ route('admin.game.edit', $game->id) }}"><i class="fas fa-pen mr-3"></i></a>
                        <form action="{{ route('admin.game.destroy', $game->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fas fa-trash text-danger"></i>
                            </button>
                        </form>
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
                    <div class="pt-3 col-4">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td>{{ $game->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Название</td>
                                            <td>{{ $game->title }}</td>
                                        </tr>
                                        <tr>
                                            <td>Описание</td>
                                            <td>{{ $game->description }}</td>
                                        </tr>
                                        <tr>
                                            <td>Изображение</td>
                                            <td>
                                                <img src="{{ asset($game->main_image) }}" alt="{{ $game->main_image }}" class="w-25">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Жанры</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @foreach($game->genres->pluck('title') as $genre)
                                                        <div class="bg-blue rounded-pill p-2 mr-1">
                                                            {{ $genre }}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Платформы</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @foreach($game->platforms->pluck('title') as $platform)
                                                        <div class="bg-blue rounded-pill p-2 mr-1">
                                                            {{ $platform }}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Цена</td>
                                            <td>{{ $game->price }}$</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

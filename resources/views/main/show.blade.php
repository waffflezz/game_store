@extends('layouts.main')
@section('content')
    <!-- ***** Featured Start ***** -->
    <div class="row">
        <div class="col-lg-12">
            <div class="feature-banner header-text">
                <div class="row">
                    <div class="col-lg-4">
                        <img src="{{ asset($game->main_image) }}" alt="" style="border-radius: 23px; height: 304px">
                    </div>
                    <div class="col-lg-8">
                        <div class="thumb">
                            <img src="{{ asset('front/assets/images/feature-right.jpg') }}" alt="" style="border-radius: 23px;">
                            <a href="https://www.youtube.com/watch?v=r1b03uKWk_M" target="_blank"><i class="fa fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Featured End ***** -->

    <!-- ***** Details Start ***** -->
    <div class="game-details">
        <div class="row">
            <div class="col-lg-12">
                <h2>{{ $game->title }}</h2>
            </div>
            <div class="col-lg-12">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="left-info">
                                <div class="left">
                                    <h3>{{ $game->title }}</h3>
                                </div>
                                <ul>
                                    <li><i class="fa fa-dollar"></i>{{ $game->price }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-info d-flex align-items-center gap-4">
                                <div class="">
                                    <h5>Жанры</h5>
                                </div>
                                <div class="d-flex align-items-center gap-4">
                                    @foreach($game->genres->pluck('title') as $genre)
                                        <p>{{ $genre }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-info d-flex align-items-center gap-4">
                                <div>
                                    <h5 >Платформы</h5>
                                </div>
                                <div class="d-flex align-items-center gap-4">
                                    @foreach($game->platforms->pluck('title') as $platform)
                                        <p>{{ $platform }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <p>{!! $game->description !!}</p>
                        </div>
                        <div class="col-lg-12">
                            <div class="main-border-button">
                                <form action="{{ route('cart.add', $game->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Купить!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Details End ***** -->
@endsection

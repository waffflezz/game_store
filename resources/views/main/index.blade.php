@extends('layouts.main')
@section('content')
    <!-- ***** Banner Start ***** -->
    <div class="main-banner">
        <div class="row">
            <div class="col-lg-7">
                <div class="header-text">
                    <h6>Welcome To Cyborg</h6>
                    <h4><em>Browse</em> Our Popular Games Here</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Banner End ***** -->

    <div class="most-popular">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-section">
                    <h4><em>Best Games</em> Buy It</h4>
                </div>
                <div class="row">
                    @foreach($games as $game)
                        <div class="col-lg-3 col-sm-6">
                            <div class="item">
                                <img class="img-fluid" style="height: 180px" src="{{ asset($game->main_image) }}" alt="$game->main_image">
                                <h4>
                                    <a href="{{ route('main.show', $game->id) }}">
                                        {{ Str::limit($game->title, 22) }}<br>
                                    </a>
                                    <span>
                                        @if(count($game->genres) > 0)
                                            {{ $game->genres->pluck('title')[0] }}
                                        @else
                                            Нет
                                        @endif
                                    </span>
                                </h4>
                                <ul>
                                    <li><i class="fa fa-dollar"></i>{{ $game->price }}</li>
                                    <li>
                                        <form action="{{ route('cart.add', $game->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="border-0 bg-transparent"><i class="fa fa-cart-shopping text-success"></i></button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@php use Illuminate\Support\Facades\Session; @endphp
@extends('layouts.main')
@section('content')
    <div class="most-popular">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-section">
                    <h4><em>Выши игры</em></h4>
                </div>
                <div class="row">
                    @if(Session::has('cart') && count(Session::get('cart')) > 0)
                        @foreach(Session::get('cart') as $game)
                            <div class="col-lg-3 col-sm-6">
                                <div class="item">
                                    <img class="img-fluid" style="height: 180px" src="{{ asset($game->main_image) }}"
                                         alt="$game->main_image">
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
                                            <form action="{{ route('cart.delete', $game->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h2>Ваша корзина пуста</h2>
                    @endif
                </div>
                <div class="row">
                    @if(Session::has('cart') && count(Session::get('cart')) > 0)
                        <form action="{{ route('cart.buy') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Купить</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

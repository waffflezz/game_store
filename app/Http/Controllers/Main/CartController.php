<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function store(Game $game)
    {
        $cart = Session::get('cart', []);

        $cart[$game->id] = $game;

        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Игра добавлена в корзину');
    }

    public function show()
    {
        return view('main.buy');
    }

    public function delete(Game $game)
    {
        $cart = Session::get('cart');
        unset($cart[$game->id]);
        Session::put('cart', $cart);
        return view('main.buy');
    }

    public function buy()
    {
        Session::put('cart', []);
        return redirect()->route('main.index');
    }
}

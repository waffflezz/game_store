<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Game;

class IndexController extends Controller
{
    public function index()
    {
        $games = Game::all();
        return view('main.index', compact('games'));
    }

    public function show(Game $game)
    {
        return view('main.show', compact('game'));
    }
}

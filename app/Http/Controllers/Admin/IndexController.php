<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGenreRequest;
use App\Http\Requests\Admin\UpdateGenreRequest;
use App\Models\Genre;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('admin.main.index');
    }
}

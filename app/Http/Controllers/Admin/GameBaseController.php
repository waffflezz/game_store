<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\GameService;

class GameBaseController extends Controller
{
    public $service;

    public function __construct(GameService $service)
    {
        $this->service = $service;
    }
}

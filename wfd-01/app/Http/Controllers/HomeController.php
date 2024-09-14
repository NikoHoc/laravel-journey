<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(): View {
        return view('home');
    }

    public function homeWithParam(string $param1, int $param2, string $param3 = null) : View {
        return view('home1', [
            'param1' => $param1,
            'param2' => $param2,
            'param3' => $param3
        ]);

    }
}

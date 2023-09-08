<?php

namespace App\Http\Controllers\Web\Articles;

use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function list()
    {
        return view('dashboard')->with([
            'title' => 'Dashboard'
        ]);
    }
}

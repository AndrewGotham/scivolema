<?php

namespace App\Http\Controllers\Site;

class HomeController
{
    public function index()
    {
        return view('site.home.index');
    }
}

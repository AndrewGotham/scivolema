<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;

class AdminController
{
    public function index(): View
    {
        return view('admin.home.index');
    }

}

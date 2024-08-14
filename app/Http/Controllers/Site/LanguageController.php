<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function __invoke(Request $request)
    {
        // Get language from the form
        $locale = $request->input('locale');

        // Set current locale
        app()->setLocale($locale);

        // Store language into the session
        session()->put('locale', $locale);

        return redirect()->back();
    }
}

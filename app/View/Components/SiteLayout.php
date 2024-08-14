<?php

namespace App\View\Components;

use App\Models\Language;
use Illuminate\View\Component;
use Illuminate\View\View;

class SiteLayout extends Component
{
//    public $languages;

    public array|\LaravelIdea\Helper\App\Models\_IH_Language_C $data;
    public function __construct($data)
    {
        $languages = Language::all();
        $this->data = $languages;
    }
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
//        $languages = Language::whereActive(true)->get();
        return view('site.layouts.app');
    }
}

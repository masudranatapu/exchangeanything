<?php

namespace App\View\Components\frontend;

use Illuminate\View\Component;

class AdlistSearch extends Component
{

    public $categories;
    public $towns;
    public $dark;
    public $totalAds;
    public $marginTop;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($categories, $towns, $dark = false, $totalAds, $marginTop)
    {
        $this->categories = $categories;
        $this->towns = $towns;
        $this->dark = $dark;
        $this->totalAds = $totalAds;
        $this->marginTop = $marginTop;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend.adlist-search');
    }
}

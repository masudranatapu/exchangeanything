<?php

namespace App\View\Components\Backend\Setting\Cms;

use Illuminate\View\Component;

class AboutSetting extends Component
{
    public $aboutBackground;
    public $aboutheading;
    public $aboutcontent;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($aboutBackground, $aboutheading, $aboutcontent)
    {
        $this->aboutBackground = $aboutBackground;
        $this->aboutheading = $aboutheading;
        $this->aboutcontent = $aboutcontent;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.setting.cms.about-setting');
    }
}

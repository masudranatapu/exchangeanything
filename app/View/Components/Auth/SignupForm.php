<?php

namespace App\View\Components\Auth;

use Illuminate\View\Component;

class SignupForm extends Component
{

    public $package_id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($packageId = null)
    {
        $this->package_id = $packageId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.auth.signup-form');
    }
}

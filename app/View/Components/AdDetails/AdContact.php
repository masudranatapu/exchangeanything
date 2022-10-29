<?php

namespace App\View\Components\AdDetails;

use Illuminate\View\Component;

class AdContact extends Component
{
    public $id,$phone, $name, $callingtime, $numberShowingPermission, $immediateAccessToNewAds;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id,$phone, $name, $callingtime, $numberShowingPermission, $immediateAccessToNewAds)
    {
        $this->id = $id;
        $this->phone = $phone;
        $this->name = $name;
        $this->callingtime = $callingtime;
        $this->numberShowingPermission = $numberShowingPermission;
        $this->immediateAccessToNewAds = $immediateAccessToNewAds;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ad-details.ad-contact');
    }
}

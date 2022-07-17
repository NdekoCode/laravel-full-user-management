<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $alert;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($alert = '')
    {
        $this->alert = $alert;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}

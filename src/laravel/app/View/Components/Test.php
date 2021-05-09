<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Test extends Component
{
    public $message;
    
    public function __construct($message = "default message")
    {
        $this->message = $message;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('components.test');
    }
}

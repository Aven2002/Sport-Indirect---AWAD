<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SearchBarComponent extends Component
{
    public $type;

    public function __construct($type)
    {
        $this->type = $type; // Define search type (products, users, orders)
    }

    public function render()
    {
        return view('components.search-bar-component');
    }
}

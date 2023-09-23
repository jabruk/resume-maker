<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavbarItem extends Component
{

    /**
     * Create a new component instance.
     */
    public function __construct(public string $href)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layout.navbar-item');
    }
}

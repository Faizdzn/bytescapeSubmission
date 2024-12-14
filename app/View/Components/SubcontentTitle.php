<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SubcontentTitle extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public string $text = 'Title', public string $variant = 'default')
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.subcontent-title');
    }
}

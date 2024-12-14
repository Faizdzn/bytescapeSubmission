<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class testimoniCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $star = "4"
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.testimoni-card');
    }
}

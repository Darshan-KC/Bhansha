<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class model extends Component
{
    // public $images;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // $this->images = view()->shared('all_images', []);

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.model');
    }
}

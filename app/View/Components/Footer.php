<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    // No necesitamos parámetros obligatorios, se puede usar un parámetro opcional si quisieras
    public function __construct() {}

    public function render(): View|Closure|string
    {
        return view('components.footer');
    }
}

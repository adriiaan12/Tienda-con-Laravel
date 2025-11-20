<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;

class Header extends Component
{
    // Parámetro opcional $product
    public function __construct(public ?Product $product = null) {}

    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}

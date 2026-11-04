<?php

namespace App\View\Components\Atomic\Organisms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LayoutsApp extends Component
{
    public function __construct(
        public ?string $title = null
    ) {}

    public function render(): View|Closure|string
    {
        return view('layouts.app');
    }
}

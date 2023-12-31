<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusSupport extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        protected string $status,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $color = 'emerald';
        $color = $this->status === 'F' ? 'red' : $color;
        $color = $this->status === 'P' ? 'cyan' : $color;
        $status = getStatusSupport($this->status);

        return view('components.status-support', compact('status', 'color'));
    }
}

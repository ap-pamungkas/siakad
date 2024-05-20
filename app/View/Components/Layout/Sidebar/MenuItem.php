<?php

namespace App\View\Components\Layout\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuItem extends Component
{
    /**
     * Create a new component instance.
     */
   public  $url;
   public  $label;
   public  $icon;

    public function __construct($icon = null, $label = null, $url = null)
    {
        if(!$url ) Throw New \Exception('Url is required');
        $this->url = ($url);
        $this->label = $label;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.sidebar.menu-item');
    }
}

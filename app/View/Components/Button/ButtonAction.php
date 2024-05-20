<?php

namespace App\View\Components\Button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Exception;
class ButtonAction extends Component
{
    /**
     * Create a new component instance.
     */
    public $url;
    public $class;
    public $icon;
    public $label;
   public function __construct($url = null, $class = null, $icon = null, $label = null)
   {
       if(!$url) throw New Exception('url not set');
       $this->class = $class;
       $this->url = url($url);
       $this->icon = $icon;
       $this->label = $label;
   }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button.button-action');
    }
}

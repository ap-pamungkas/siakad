<?php

namespace App\View\Components\Layout\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Routing\Route;
class MenuItem extends Component
{
    /**
     * Create a new component instance.
     */
    public $url;
    public $label;
    public $icon;
    public $active;

   public function __construct($url, $label, $icon)
   {
    $this->url     = $url;
    $this->label   = $label;
    $this->icon    = $icon;
    $this->active  = $this->checkActive();
   }

   /**
    * Get the view / contents that represent the component.
    */


public function checkActive()
{
    $state = true;
    $url = $this->url;
    $path = parse_url($url, PHP_URL_PATH);
    $arr_url = explode('/', trim($path, '/'));
    $current_url = explode('/', trim(request()->path(), '/'));
    foreach ($arr_url as $key => $value) {
        if (!isset($current_url[$key]) || $current_url[$key] != $value) {
            $state = false;
            break;
        }
    }
    return $state;
}

    /**
     *
     *
     * Get the view / contents that represent the component.
     */

    public function render(): View|Closure|string
    {
        return view('components.layout.sidebar.menu-item');
    }
}

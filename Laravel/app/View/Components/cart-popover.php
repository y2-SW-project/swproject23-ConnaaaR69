<?php

namespace App\View\Components;

use Illuminate\View\Component;

class cart-popover extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function passThrough($products) {
        $this->cartProducts = $products;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cart-popover');
    }
}

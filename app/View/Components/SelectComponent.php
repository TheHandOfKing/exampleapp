<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectComponent extends Component
{
    public $label, $name, $multiple, $popovertitle, $popovercontent;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $multiple = false, $popovertitle = false, $popovercontent = false)
    {
        $this->label = $label;
        $this->name = $name;
        $this->multiple = $multiple;
        $this->popovertitle = $popovertitle;
        $this->popovercontent = $popovercontent;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-component');
    }
}

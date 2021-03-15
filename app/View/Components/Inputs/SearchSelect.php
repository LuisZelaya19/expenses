<?php

namespace App\View\Components\Inputs;

use Illuminate\View\Component;

class SearchSelect extends Component
{
    public $array;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($array = null)
    {
        $this->array = $array;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.inputs.search-select');
    }
}

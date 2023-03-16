<?php

namespace App\View\Components\Table;

use App\Helpers\Components\Action as baseAction;
use Illuminate\View\Component;

class Action extends Component
{

    public $action;
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(baseAction $action, $id)
    {
        $this->action = $action;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table.action');
    }
}

<?php

namespace App\View\Components\Group;

use Illuminate\View\Component;

class BreadCrumb extends Component
{


    public string $pageTittle;
    public array $indexes;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $pageTittle , array $indexes = [])
    {
        $this->pageTittle = ucwords($pageTittle);
        $this->indexes = $indexes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.group.bread-crumb');
    }
}

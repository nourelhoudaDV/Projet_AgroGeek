<?php

namespace App\View\Components\Media;

use Illuminate\View\Component;

class Imaage extends Component
{

    public string $alt;
    public string $src;
    public string $loaderPath;
    public bool $lazyload;

    /**
     * @param string $alt
     * @param string $src
     * @param bool $lazyload
     */
    public function __construct(string $src = '', string $alt = '', bool $lazyload = true)
    {
        $this->alt = $alt;
        $this->src = $src;
        $this->lazyload = $lazyload;
        $this->loaderPath =  config('configs.loader_path');
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.media.imaage');
    }
}

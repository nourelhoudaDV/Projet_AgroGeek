<?php

namespace App\View\Components\Form;



use App\View\Component;

class TextArea extends Component
{
    public $parentClasses;
    public  $placeholder;
    public  $col;
    public $horizontal;

    /**
     * @param string $label
     * @param string $name
     * @param bool $required
     * @param bool $readonly
     * @param string $parentClasses
     * @param string|bool $placeholder
     * @param bool $horizontal
     */
    public function __construct(
        string $label,
        string $name,
        bool   $required = false,
        bool   $readonly = false,
        string      $parentClasses = '',
        string|bool $placeholder = false,
        bool        $horizontal = true,
        string        $col = 'col-12'
    )
    {
        parent::__construct();
        $this->label = ucfirst($label);
        $this->name = $name;
        $this->required = $required;
        $this->readonly = $readonly;
        $this->parentClasses = $parentClasses;
        $this->col = $col;
        $this->horizontal = $horizontal;




        if($placeholder !== false){
            if (empty($placeholder)) {
                $this->placeholder = $this->label;
            } else {
                $this->placeholder = $placeholder;
            }
        }
        $this->getValue();
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.text-area');
    }
}

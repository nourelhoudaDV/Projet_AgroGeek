<?php

namespace App\View\Components\Form;

use App\View\Component;

class Input extends Component
{


    public $horizontal;
    public $placeholder;
    public $col;

    public $button;


    /**
     * @param string $label
     * @param string $name
     * @param bool $required
     * @param bool $readonly
     * @param string $type
     * @param string|bool $placeholder
     * @param string $parentClasses
     * @param bool $horizontal
     * @param int $col
     * @param null $inputButtonHtml
     */
    public function __construct(
        string      $name,
        string      $label = '',
        bool        $required = false,
        bool        $readonly = false,
        string      $type = 'text',
        string|bool $placeholder = false,
        string      $parentClasses = '',
        bool        $horizontal = true,
        string         $col = "col-12",
                    $inputButtonHtml = null
    )
    {
        parent::__construct();

        if (empty($label)) {
            $this->label = ucwords(cleanString($name));
        } else {
            $this->label = ucwords($label);
        }

        $this->type = $type;
        $this->name = $name;
        $this->required = $required;
        $this->readonly = $readonly;
        $this->horizontal = $horizontal;
        $this->col = $col;
        $this->parentClasses = $parentClasses;
        $this->button = $inputButtonHtml;

        if ($placeholder !== false) {
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
    public
    function render()
    {
        return view('components.form.input');
    }
}

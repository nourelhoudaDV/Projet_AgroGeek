<?php

namespace App\Helpers\Components;

class Action
{

    public const  TYPE_DELETE_ALL = 'DELETE_ALL';
    public const  TYPE_AJAX = 'AJAX';
    public const  TYPE_NORMAL = 'NORMAL';


    public string $name;
    public string $type;
    public string $url;
    public bool $blank;
    public string $route;


    /**
     * @return string
     */
    public function getUrl(): string
    {

        if (!empty($this->route)) {
            return route($this->route);
        } elseif (empty($this->url)) {
            return "#";
        }

        return $this->url;
    }


    /**
     * @param string $name
     * @param string $type
     * @param string $url
     * @param string $route
     * @param bool $blank
     */
    public function __construct(string $name, string $type, string $url = '', string $route = '', bool $blank = false)
    {
        $this->name = $name;
        $this->blank = $blank;
        $this->type = $type;
        $this->route = $route;
        $this->url = $url;
    }


    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'blank' => $this->blank,
            'url' => $this->getUrl(),
        ];
    }


}

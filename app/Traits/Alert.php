<?php

namespace App\Traits;

trait Alert
{

    public function question($title = '', $text = '')
    {
        session()->flash('alert', [
            'text' => $text,
            'title' => $title,
            'icon' => 'question'
        ]);
    }

    public function success($title = '', $text = '')
    {
        session()->flash('alert', [
            'text' => $text,
            'title' => $title,
            'icon' => 'success'
        ]);
    }

    public function error($title = '', $text = '')
    {
        session()->flash('alert', [
            'text' => $text,
            'title' => $title,
            'icon' => 'error'
        ]);

    }

    public function info($title = '', $text = '')
    {
        session()->flash('alert', [
            'text' => $text,
            'title' => $title,
            'icon' => 'info'
        ]);

    }

    public function warning($title = '', $text = '')
    {
        session()->flash('alert', [
            'text' => $text,
            'title' => $title,
            'icon' => 'warning'
        ]);
    }

}

<?php

namespace App\Helpers;

use Illuminate\Support\Pluralizer;

class FileGenerator
{
    private $folder;
    private $name;

    public function init($folder, $name)
    {
        $this->folder = $folder;
        $this->name = $name;

    }

    private function generateController()
    {

    }

}

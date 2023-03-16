<?php

namespace App\Http\Controllers;

use App\Traits\Alert;
use App\Traits\Fileable;
use App\Traits\FileSavable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, Fileable, Alert;
}

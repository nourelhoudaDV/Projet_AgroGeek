<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Models\techniquesAgricole;
use Illuminate\Http\Request;

class TechniquesAgricoleController extends Controller
{
    public function index()
    {
        $actions = [
            new Action(ucwords(trans('')), Action::TYPE_NORMAL, url: route('TechniquesAgricole.create')),
            new Action(ucwords(trans('words.edit')), Action::TYPE_NORMAL , url: route('TechniquesAgricole.edit')),
        ];
        $heads = [
            new Head('nom', Head::TYPE_TEXT, trans('')),
            new Head('description', Head::TYPE_TEXT, trans('')),
        ];
        $collection = techniquesAgricole::all();
        return view('crud.TechniquesAgricole.index', compact('actions', 'heads', 'collection'));
    }


    
}

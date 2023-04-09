<?php

namespace App\Http\Controllers;

use App\Models\CultureParcelle;
use Illuminate\Http\Request;

class CultureParcelleController extends Controller
{
    public function create()
    {
        return view('crud.culture.create');
    }

    public function store(Request $request)
    {
        CultureParcelle::create($request->all());
        $this->success(text: trans('messages.added_message'));
        return redirect()->route('cpCreate');
    }
}

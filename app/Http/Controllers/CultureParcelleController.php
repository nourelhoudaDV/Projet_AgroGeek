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
        // dd($request->idp);
        CultureParcelle::create([
            'varieteID' => $request->idV, 
            'parcelleId' => $request->idp
        ]);
        $this->success(text: trans('messages.added_message'));
        return redirect()->route('cultureparcelle.create');
    }
}

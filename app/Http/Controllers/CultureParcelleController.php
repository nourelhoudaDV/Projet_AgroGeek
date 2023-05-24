<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Head;
use App\Models\CultureParcelle;
use App\Models\Variete;
use Illuminate\Http\Request;

class CultureParcelleController extends Controller
{
    public function create()
    {
        $heads = [
            new Head('espece', Head::TYPE_TEXT, trans('words.especes_id')),
            new Head('nomCommercial', Head::TYPE_TEXT, trans('words.nomCommercial')),
            new Head('appelationAr', Head::TYPE_TEXT, trans('words.appelationAr')),
            new Head('qualite', Head::TYPE_TEXT, trans('words.qualite')),
            new Head('precocite', Head::TYPE_TEXT, trans('words.precocite')),
            new Head('resistance', Head::TYPE_TEXT, trans('words.resistance')),
            new Head('competitivite', Head::TYPE_TEXT, trans('words.competitivite')),
            new Head('description', Head::TYPE_TEXT, trans('words.description')),
        ];
        $collection = Variete::all();
        return view('crud.culture.create', compact('heads', 'collection'));
    }

    public function store(Request $request)
    {

        if(isset($request['check'])){
        foreach($request['check'] as $idV)
        {
            CultureParcelle::create([
            'varieteID' => $idV,
            'parcelleId' => $request['idp']
            ]);
        }
        }
        $this->success(text: trans('messages.added_message'));
        return redirect()->route('cultureparcelle.create');
    }
}

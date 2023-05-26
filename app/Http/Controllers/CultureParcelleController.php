<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Head;
use App\Models\CultureParcelle;
use App\Models\Parcelle;
use App\Models\Variete;
use Illuminate\Http\Request;

class CultureParcelleController extends Controller
{
    public function index()
    {
        $Varietes = Variete::all();
        $parcelles = Parcelle::all();
        $CultureParcelle = CultureParcelle::all();
        return view('crud.culture.index', compact('Varietes', 'parcelles', 'CultureParcelle'));
    }
    public function save(Request $request)
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
        return redirect()->route('cultureparcelle.index');

    }
    public function create()
    {
        $heads = [
            new Head('espece', Head::TYPE_TEXT, 'espece'),
            new Head('nomCommercial', Head::TYPE_TEXT, 'nom Commercial'),
            new Head('appelationAr', Head::TYPE_TEXT, 'appelation Arabe'),
            new Head('qualite', Head::TYPE_TEXT, 'qualite'),
            new Head('precocite', Head::TYPE_TEXT, 'precocite'),
            new Head('resistance', Head::TYPE_TEXT, 'resistance'),
            new Head('competitivite', Head::TYPE_TEXT, 'competitivite'),
            new Head('description', Head::TYPE_TEXT, 'description'),
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

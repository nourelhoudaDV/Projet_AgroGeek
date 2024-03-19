<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Requests\Fermes\Add as FermesAdd;
use App\Http\Requests\Fermes\Update;
use Illuminate\Http\Request;
use App\Models\Ferme as ModelTarget;
use App\Models\Parcelle;
use App\Models\Typesol;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Routing\Route as RoutingRoute;
use League\Flysystem\FilesystemException;

use function PHPSTORM_META\type;

class FermeController extends Controller
{
    /***
     *  page index
     */
    protected function index(Request $request)
    {

        $actions = [
            new Action(ucwords('Ajouter Nouveau'), Action::TYPE_NORMAL,  route('fermes.create')),
            new Action(ucwords('Supprimer'), Action::TYPE_DELETE_ALL, route('fermes.destroyGroup')),
        ];
        $heads = [
            new Head('logo', Head::TYPE_IMG, 'logo'),
            new Head('nomDomaine', Head::TYPE_TEXT,'nom de ferme'),
            new Head('fullNameG', Head::TYPE_TEXT, 'nom Gerant'),
            new Head('cin', Head::TYPE_TEXT, 'cin'),
            new Head('contactG', Head::TYPE_TEXT, 'contactG'),
            new Head('SAT', Head::TYPE_TEXT, 'Superficie Agricole Totale'),
            new Head('SAU', Head::TYPE_TEXT, 'Superficie Agricole Utile'),
            new Head('observation', Head::TYPE_TEXT, 'observation'),
            new Head('fixe', Head::TYPE_TEXT, 'fixe'),
            new Head('fax', Head::TYPE_TEXT, 'fax'),
            new Head('GSM1', Head::TYPE_TEXT, 'GSM1'),
            new Head('GSM2', Head::TYPE_TEXT, 'GSM2'),
            new Head('email', Head::TYPE_TEXT, 'email'),
            new Head('siteWeb', Head::TYPE_TEXT, 'siteWeb'),
            new Head('Douar', Head::TYPE_TEXT, 'Douar'),
            new Head('Cercle', Head::TYPE_TEXT, 'Circle'),
            new Head('province', Head::TYPE_TEXT, 'province'),
            new Head('region', Head::TYPE_TEXT, 'region'),
            new Head('adresse', Head::TYPE_TEXT,'address'),
            new Head('gps', Head::TYPE_TEXT, 'gps'),
            new Head('ville', Head::TYPE_TEXT, 'ville'),
        ];
        $collection = ModelTarget::all();
        return view('crud.ferme.index', compact(['actions', 'heads', 'collection']));
    }

    public function create()
    {
        return view('crud.ferme.create');
    }

    public function show(Request $request, $id)
    {
        $model = ModelTarget::query()->with(['parcelles'])->where(ModelTarget::PK, $id)->firstOrFail();
        $typesols = Typesol::query()
            ->select('typesols.*', 'fermes.idF as laravel_through_key')
            ->join('fermes', 'typesols.ferme', 'fermes.idF')
            ->where('fermes.idF', $id)
            ->get();

        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('parcelles.create', [
                'id_ferme' => $model[ModelTarget::PK],
                'back' => url()->current()
            ])),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('parcelles.destroyGroup'))
        ];
        $actions2 = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('typesols.create',
             [
                'id_ferme' => $model[ModelTarget::PK],
                'back' => url()->current()
            ])),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('typesols.destroyGroup'))
        ];
        $heads = [
            new Head('codification', Head::TYPE_TEXT,'codification'),
            new Head('superficie', Head::TYPE_TEXT, 'superficie'),
            new Head('modeCulture', Head::TYPE_TEXT, 'modeCulture'),
            new Head('topographie', Head::TYPE_TEXT, 'topographie'),
            new Head('pente', Head::TYPE_TEXT, 'pente'),
            new Head('pierosite', Head::TYPE_TEXT,'pierosite'),
            new Head('gps', Head::TYPE_TEXT, 'gps'),
            new Head('description', Head::TYPE_TEXT,'description'),
            new Head('typeSol', Head::TYPE_TEXT, 'typeSol'),
        ];
        $heads2 = [
            new Head('vernaculaure', Head::TYPE_TEXT, 'vernaculaure'),
            new Head('nomDomaine', Head::TYPE_TEXT, 'nom de Ferme'),
            new Head('teneurArgile', Head::TYPE_TEXT, 'teneur Argile'),
            new Head('teneurLimon', Head::TYPE_TEXT, 'teneur Limon'),
            new Head('teneurSable', Head::TYPE_TEXT, 'teneur Sable'),
            new Head('teneurPhosphore', Head::TYPE_TEXT,'teneur Phosphore'),
            new Head('teneurPotassiume', Head::TYPE_TEXT, 'teneur Potassiume'),
            new Head('teneurAzote', Head::TYPE_TEXT, 'teneurAzote'),
            new Head('calcaireActif', Head::TYPE_TEXT, 'calcaire Actif'),
            new Head('calcaireTotal', Head::TYPE_TEXT, 'calcaire Total'),
            new Head('conductiviteElectrique', Head::TYPE_TEXT, 'conductive Electrique'),
            new Head('HCC', Head::TYPE_TEXT, 'Humidité à la capacité au champ'),
            new Head('HPF', Head::TYPE_TEXT, 'Humidité Point de Filtration'),
            new Head('DA', Head::TYPE_TEXT, 'densité Apparente'),
        ];
        return view('crud.ferme.edit', compact('model', 'heads', 'actions', 'typesols', 'heads2', 'actions2'));
    }

    public function destroyGroup(Request $request)
    {
       
        $ids = $request['ids'] ?? [];
       
        foreach ($ids as $id) {
            $client = ModelTarget::query()->findOrFail($id);
            $client?->delete();
        }
        $this->success(trans('messages.deleted_message'));
        return response()->json(['success' => true]);
    }

    public function destroy(Request $request, $id)
    {
        ModelTarget::query()->findOrFail($id)->delete();
        $this->success(trans('messages.deleted_message'));
        return redirect(Route('fermes.index'));
    }

    public function store(FermesAdd $request)
    {
        $validated = $request->validated();
        $logo = $request->validated()['logo'] ?? null;
        unset($validated['logo']);

        if($logo === null){
            $validated['logo'] = asset('assets\media\default\image-placeholder.png');
            $model = ModelTarget::query()->create($validated);
        }else{
            $model = ModelTarget::query()->create($validated);

            $model->update([
                'logo' => $this->saveFile('fermes',$logo)
            ]);
        }

        $this->success(trans('messages.added_message'));
        return redirect(route('fermes.show', $model[ModelTarget::PK]));
    }

    public function update(Update $request, $id)
    {
        $data = ModelTarget::query()->findOrFail($id);
        $validated = $request->validated();
        // dd($request);

        $validated = $request->validated();
        unset($validated['logo']);

        $this->saveAndDeleteOld($request->validated()['logo'] ?? null, 'fermes', $data, 'logo');
        $data->update($validated);
    

        $this->success(trans('messages.updated_message'));
        return back();
    }
}


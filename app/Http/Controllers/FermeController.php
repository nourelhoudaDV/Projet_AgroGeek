<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Requests\Fermes\Add as FermesAdd;
use Illuminate\Http\Request;
use App\Models\Ferme as ModelTarget;
use App\Models\Parcelle;
use App\Models\Typesol;
use Illuminate\Routing\Route;
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
            new Action(ucwords(trans('pages/fermes.add_a_new_ferme')), Action::TYPE_NORMAL, url: route('fermes.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('fermes.destroyGroup')),
            // new Action(ucwords(trans('pages/parcelles.add_a_new_parcelle')), Action::TYPE_NORMAL, url: route('parcelles.create')),
            // new Action(ucwords(trans('pages/typeSols.add_a_new_typesol')), Action::TYPE_NORMAL, url: route('typesols.create')),
        ];
        $heads = [
            new Head('logo', Head::TYPE_IMG, trans('pages/fermes.logo')),
            new Head('nomDomaine', Head::TYPE_TEXT, trans('pages/fermes.nomDomaine')),
            new Head('fullNameG', Head::TYPE_TEXT, trans('pages/fermes.fullNameG')),
            new Head('cin', Head::TYPE_TEXT, trans('pages/fermes.cin')),
            new Head('contactG', Head::TYPE_TEXT, trans('pages/fermes.contactG')),
            new Head('SAT', Head::TYPE_TEXT, trans('pages/fermes.SAT')),
            new Head('SAU', Head::TYPE_TEXT, trans('pages/fermes.SAU')),
            new Head('observation', Head::TYPE_TEXT, trans('pages/fermes.observation')),
            new Head('fixe', Head::TYPE_TEXT, trans('pages/fermes.fixe')),
            new Head('fax', Head::TYPE_TEXT, trans('pages/fermes.fax')),
            new Head('GSM1', Head::TYPE_TEXT, trans('pages/fermes.GSM1')),
            new Head('GSM2', Head::TYPE_TEXT, trans('pages/fermes.GSM2')),
            new Head('email', Head::TYPE_TEXT, trans('pages/fermes.email')),
            new Head('siteWeb', Head::TYPE_TEXT, trans('pages/fermes.siteWeb')),
            new Head('Douar', Head::TYPE_TEXT, trans('pages/fermes.Douar')),
            new Head('Cercle', Head::TYPE_TEXT, trans('pages/fermes.Circle')),
            new Head('province', Head::TYPE_TEXT, trans('pages/fermes.province')),
            new Head('region', Head::TYPE_TEXT, trans('pages/fermes.region')),
            new Head('adresse', Head::TYPE_TEXT, trans('pages/fermes.address')),
            new Head('gps', Head::TYPE_TEXT, trans('pages/fermes.gps')),
            new Head('ville', Head::TYPE_TEXT, trans('pages/fermes.city')),
        ];

        $collection = ModelTarget::all();

        // $actions1 = [
        //     new Action(ucwords(trans('pages/parcelles.add_a_new_parcelle')), Action::TYPE_NORMAL, url: route('parcelles.create')),
        //     new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('parcelles.destroyGroup'))
        // ];
        // $heads1 = [
        //     new Head('codification', Head::TYPE_TEXT, trans('pages/parcelles.codification')),
        //     new Head('Ferme', Head::TYPE_TEXT, trans('pages/parcelles.Ferme')),
        //     new Head('superficie', Head::TYPE_TEXT, trans('pages/parcelles.superficie')),
        //     new Head('modeCulture', Head::TYPE_TEXT, trans('pages/parcelles.modeCulture')),
        //     new Head('topographie', Head::TYPE_TEXT, trans('pages/parcelles.topographie')),
        //     new Head('pente', Head::TYPE_TEXT, trans('pages/parcelles.pente')),
        //     new Head('pierosite', Head::TYPE_TEXT, trans('pages/parcelles.pierosite')),
        //     new Head('gps', Head::TYPE_TEXT, trans('pages/parcelles.gps')),
        //     new Head('description', Head::TYPE_TEXT, trans('pages/parcelles.description')),
        //     new Head('typeSol', Head::TYPE_TEXT, trans('pages/parcelles.typeSol')),
        // ];
        // $actions2 = [
        //     new Action(ucwords(trans('pages/typeSols.add_a_new_typesol')), Action::TYPE_NORMAL, url: route('typesols.create')),
        //     new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('typesols.destroyGroup'))
        // ];
        // $heads2 = [
        //     new Head('vernaculaure', Head::TYPE_TEXT, trans('pages/typeSols.vernaculaure')),
        //     new Head('nomDomaine', Head::TYPE_TEXT, trans('pages/typeSols.nomDomaine')),
        //     new Head('teneurArgile', Head::TYPE_TEXT, trans('pages/typeSols.teneurArgile')),
        //     new Head('teneurLimon', Head::TYPE_TEXT, trans('pages/typeSols.teneurLimon')),
        //     new Head('teneurSable', Head::TYPE_TEXT, trans('pages/typeSols.teneurSable')),
        //     new Head('teneurPhosphore', Head::TYPE_TEXT, trans('pages/typeSols.teneurPhosphore')),
        //     new Head('teneurPotassiume', Head::TYPE_TEXT, trans('pages/typeSols.teneurPotassiume')),
        //     new Head('teneurAzote', Head::TYPE_TEXT, trans('pages/typeSols.teneurAzote')),
        //     new Head('calcaireActif', Head::TYPE_TEXT, trans('pages/typeSols.calcaireActif')),
        //     new Head('calcaireTotal', Head::TYPE_TEXT, trans('pages/typeSols.calcaireTotal')),
        //     new Head('conductiveElectrique', Head::TYPE_TEXT, trans('pages/typeSols.conductiveElectrique')),
        //     new Head('HCC', Head::TYPE_TEXT, trans('pages/typeSols.HCC')),
        //     new Head('HPF', Head::TYPE_TEXT, trans('pages/typeSols.HPF')),
        //     new Head('DA', Head::TYPE_TEXT, trans('pages/typeSols.DA')),
        // ];

        // $collection1 = Parcelle::all();
        // $collection2 = Typesol::all();
        // $parcelle = ['actions1', 'heads1', 'collection1'];
        // $typesol = ['actions2', 'heads2', 'collection2'];
        // $this->success(text: trans('messages.deleted_message'));
        return view('crud.Ferme.index', compact(['actions', 'heads', 'collection']));//$parcelle,$typesol]));
    }

    public function create()
    {
        return view('crud.Ferme.create');
    }

    public function show(Request $request, $id)
    {
        // $data = ModelTarget::query()->findOrFail($id);
        // return view('crud.Ferme.edit', [
        //     'model' => $data
        // ]);
        $model = ModelTarget::query()->with('parcelles')->where( ModelTarget::PK, $id )->firstOrFail();
        // $model2 = ModelTarget::query()->with('typesols')->where( ModelTarget::PK, $id )->firstOrFail();

        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('parcelles.create' , [
                'id_ferme' => $model[ModelTarget::PK],
                'back' => url()->current()
            ])),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('parcelles.destroyGroup'))
        ];
        // $actions2 = [
        //     new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('typesols.create' , [
        //         'id_ferme' => $model2[ModelTarget::PK],
        //         'back' => url()->current()
        //     ])),
        //     new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('typesols.destroyGroup'))
        // ];
        $heads = [
            new Head('codification', Head::TYPE_TEXT, trans('pages/parcelles.codification')),
            new Head('Ferme', Head::TYPE_TEXT, trans('pages/parcelles.Ferme')),
            new Head('superficie', Head::TYPE_TEXT, trans('pages/parcelles.superficie')),
            new Head('modeCulture', Head::TYPE_TEXT, trans('pages/parcelles.modeCulture')),
            new Head('topographie', Head::TYPE_TEXT, trans('pages/parcelles.topographie')),
            new Head('pente', Head::TYPE_TEXT, trans('pages/parcelles.pente')),
            new Head('pierosite', Head::TYPE_TEXT, trans('pages/parcelles.pierosite')),
            new Head('gps', Head::TYPE_TEXT, trans('pages/parcelles.gps')),
            new Head('description', Head::TYPE_TEXT, trans('pages/parcelles.description')),
            new Head('typeSol', Head::TYPE_TEXT, trans('pages/parcelles.typeSol')),
        ];
        //  $heads2 = [
        //     new Head('vernaculaure', Head::TYPE_TEXT, trans('pages/typeSols.vernaculaure')),
        //     new Head('nomDomaine', Head::TYPE_TEXT, trans('pages/typeSols.nomDomaine')),
        //     new Head('teneurArgile', Head::TYPE_TEXT, trans('pages/typeSols.teneurArgile')),
        //     new Head('teneurLimon', Head::TYPE_TEXT, trans('pages/typeSols.teneurLimon')),
        //     new Head('teneurSable', Head::TYPE_TEXT, trans('pages/typeSols.teneurSable')),
        //     new Head('teneurPhosphore', Head::TYPE_TEXT, trans('pages/typeSols.teneurPhosphore')),
        //     new Head('teneurPotassiume', Head::TYPE_TEXT, trans('pages/typeSols.teneurPotassiume')),
        //     new Head('teneurAzote', Head::TYPE_TEXT, trans('pages/typeSols.teneurAzote')),
        //     new Head('calcaireActif', Head::TYPE_TEXT, trans('pages/typeSols.calcaireActif')),
        //     new Head('calcaireTotal', Head::TYPE_TEXT, trans('pages/typeSols.calcaireTotal')),
        //     new Head('conductiveElectrique', Head::TYPE_TEXT, trans('pages/typeSols.conductiveElectrique')),
        //     new Head('HCC', Head::TYPE_TEXT, trans('pages/typeSols.HCC')),
        //     new Head('HPF', Head::TYPE_TEXT, trans('pages/typeSols.HPF')),
        //     new Head('DA', Head::TYPE_TEXT, trans('pages/typeSols.DA')),
        // ];


        return view('crud.Ferme.edit', compact('model' , 'heads' , 'actions'));
        // ,'model2' , 'heads2' , 'actions2'));
    }

    public function destroyGroup(Request $request)
    {
        $ids = $request['ids'] ?? [];
       foreach ($ids as $id) {
           $client = ModelTarget::query()->find((int)\Crypt::decrypt($id));
           $client?->delete();
        }
        $this->success(text: trans('messages.deleted_message'));
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

        // $data = ModelTarget::query()
        //     ->create($validated);
        // $logo = $this->saveFile('fermes', file: $logo);
        // $data->update([
        //     'logo' => $logo
        // ]);

        $model = ModelTarget::query()->create($validated);
        $model->update([
            'logo' => $this->saveFile('fermes', file: $logo)
        ]);
        $this->success(text: trans('messages.added_message'));
        // return redirect(Route('fermes.index'));
        return redirect(route('fermes.show', $model[ModelTarget::PK]));

    }

    // public function update(FermesAdd $request, $id)
    // {
    //     $data = ModelTarget::query()->findOrFail($id);

    //     $validated = $request->validated();
    //     unset($validated['logo']);

    //     $this->saveAndDeleteOld(
    //         $request->validated()['logo'] ?? null, 'fermes', $data, 'logo');
    //     $data->update($validated);

    //     $this->success(text: trans('messages.updated_message'));
    //     return redirect(Route('fermes.index'));
    // }
    public function update(FermesAdd $request, $id)
{
    $data = ModelTarget::query()->findOrFail($id);

    $validated = $request->validated();

    $logo = $validated['logo'] ?? null;
    unset($validated['logo']);

    if ($logo !== null) {
        $this->saveAndDeleteOld($logo, 'fermes', $data, 'logo');
    }

    $data->update($validated);

    $this->success(text: trans('messages.updated_message'));
    // return redirect(Route('fermes.index'));
    return back();

}

}

<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Requests\Fermes\Add as FermesAdd;
use Illuminate\Http\Request;
use App\Models\Ferme as ModelTarget;
use Illuminate\Routing\Route;
use Symfony\Component\Routing\Route as RoutingRoute;
use League\Flysystem\FilesystemException;

class FermeController extends Controller
{
    /***
     *  page index
     */
    protected function index()
    {

        $actions = [
            new Action(ucwords(trans('words.add_ferme')), Action::TYPE_NORMAL, url: route('fermes.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('fermes.destroyGroup')),
            new Action(ucwords(trans('words.add_parcelle')), Action::TYPE_NORMAL, url: route('parcelles.create')),
            new Action(ucwords(trans('words.add_typesol')), Action::TYPE_NORMAL, url: route('typesols.create')),
        ];
        $heads = [
            new Head('logo', Head::TYPE_IMG, trans('words.logo')),
            new Head('nomDomaine', Head::TYPE_TEXT, trans('words.name')),
            new Head('fullNameG', Head::TYPE_TEXT, 'words.fullNameG'),
            new Head('cin', Head::TYPE_TEXT, 'words.cin'),
            new Head('contactG', Head::TYPE_TEXT, 'words.contactG'),
            new Head('SAT', Head::TYPE_TEXT, 'words.SAT'),
            new Head('SAU', Head::TYPE_TEXT, 'words.SAU'),
            new Head('observation', Head::TYPE_TEXT, 'words.observation'),
            new Head('fixe', Head::TYPE_TEXT, 'words.fixe'),
            new Head('fax', Head::TYPE_TEXT, 'words.fax'),
            new Head('GSM1', Head::TYPE_TEXT, 'words.GSM1'),
            new Head('GSM2', Head::TYPE_TEXT, 'words.GSM2'),
            new Head('email', Head::TYPE_TEXT, trans('words.words.email')),
            new Head('siteWeb', Head::TYPE_TEXT, 'words.siteWeb'),
            new Head('Douar', Head::TYPE_TEXT, 'words.Douar'),
            new Head('Cercle', Head::TYPE_TEXT, 'words.Circle'),
            new Head('province', Head::TYPE_TEXT, 'words.province'),
            new Head('region', Head::TYPE_TEXT, 'words.region'),
            new Head('adresse', Head::TYPE_TEXT, 'words.address'),
            new Head('gps', Head::TYPE_TEXT, 'words.gps'),
            new Head('ville', Head::TYPE_TEXT, 'words.city'),
        ];

        $collection1 = ModelTarget::all();
        // $this->success(text: trans('messages.deleted_message'));
        return view('crud.Ferme.index', compact(['actions', 'heads', 'collection1']));
    }

    public function create()
    {
        return view('crud.Ferme.create');
    }

    public function show(Request $request, $id)
    {
        $data = ModelTarget::query()->findOrFail($id);
        return view('crud.Ferme.edit', [
            'model' => $data
        ]);
    }

    public function destroyGroup(Request $request)
    {
        $ids = $request['ids'] ?? [];
        foreach ($ids as $id) {
            $model = ModelTarget::query()->find((int)\Crypt::decrypt($id));
            $model?->delete();
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
        return redirect(Route('fermes.index'));
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
    return redirect(Route('fermes.index'));
}

}

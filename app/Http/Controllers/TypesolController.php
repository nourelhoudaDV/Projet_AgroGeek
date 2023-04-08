<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use Illuminate\Http\Request;
use App\Http\Requests\Typesols\Add as TypesolsAdd;
use App\Models\Typesol as ModelTarget;
use League\Flysystem\FilesystemException;


class TypesolController extends Controller
{

    protected function index()
    {
        /***
         *  page index
         */
        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('typesols.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('typesols.destroyGroup'))
        ];
        $heads = [
            new Head('vernaculaure', Head::TYPE_TEXT, trans('words.vernaculaure')),
            new Head('nomDomaine', Head::TYPE_TEXT, trans('words.nomDomaine')),
            new Head('teneurArgile', Head::TYPE_TEXT, trans('words.teneurArgile')),
            new Head('teneurLimon', Head::TYPE_TEXT, trans('words.teneurLimon')),
            new Head('teneurSable', Head::TYPE_TEXT, trans('words.teneurSable')),
            new Head('teneurPhosphore', Head::TYPE_TEXT, trans('words.teneurPhosphore')),
            new Head('teneurPotassiume', Head::TYPE_TEXT, trans('words.teneurPotassiume')),
            new Head('teneurAzote', Head::TYPE_TEXT, trans('words.teneurAzote')),
            new Head('calcaireActif', Head::TYPE_TEXT, trans('words.calcaireActif')),
            new Head('calcaireTotal', Head::TYPE_TEXT, trans('words.calcaireTotal')),
            new Head('conductiveElectrique', Head::TYPE_TEXT, trans('words.conductiveElectrique')),
            new Head('HCC', Head::TYPE_TEXT, trans('words.HCC')),
            new Head('HPF', Head::TYPE_TEXT, trans('words.HPF')),
            new Head('DA', Head::TYPE_TEXT, trans('words.DA')),
        ];

        $collection = ModelTarget::all();
        // $this->success(text: trans('messages.deleted_message'));
        // return view('crud.typesol.index', compact(['actions', 'heads', 'collection']));
        return view('crud.historique', compact(['actions', 'heads', 'collection']));
    }

    /***
     * Page create
     */
    public function create()
    {
        return view('crud.typesol.create');
    }

    /***
     * Page edit
     */
    public function show(Request $request, $id)
    {
        $data = ModelTarget::query()->findOrFail($id);
        return view('crud.typesol.edit', [
            'model' => $data
        ]);
    }

    /***
     * Delete multi records
     */
    //---------------------------------
    public function destroyGroup(Request $request)
    {
        $idTS = $request['idTS'] ?? [];
        foreach ($idTS as $id) {
            $data = ModelTarget::query()->find((int)\Crypt::decrypt($id));
            $data?->delete();
        }
        $this->success(text: trans('messages.deleted_message'));
        return response()->json(['success' => true]);
    }
    //----------------------------
    /***
     * Delete one record by id if exists
     */
    public function destroy(Request $request, $id)
    {
        ModelTarget::query()->findOrFail($id)->delete();
        $this->success(trans('messages.deleted_message'));
        return redirect(Route('typesols.index'));
    }

    /***
     * Add a new record
     */
    public function store(TypesolsAdd $request)
    {
        $validated = $request->validated();
        $data = ModelTarget::query()
            ->create($validated);
        $data->update([]);
        $this->success(text: trans('messages.added_message'));
        return redirect(Route('typesols.index'));
    }


    /***
     * Update record if exists
     */
    public function update(TypesolsAdd $request, $id)
    {
        $data = ModelTarget::query()->findOrFail($id);
        $validated = $request->validated();
        $data->update($validated);
        $this->success(text: trans('messages.updated_message'));
        return redirect(Route('typesols.index'));
    }
}

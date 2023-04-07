<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use Illuminate\Http\Request;
use App\Http\Requests\Parcelles\Add as ParcellesAdd;
use App\Models\Parcelle as ModelTarget;
use League\Flysystem\FilesystemException;


class ParcelleController extends Controller
{
    protected function index()
    {
        /***
         *  page index
         */
        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('parcelles.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('parcelles.destroyGroup'))
        ];
        $heads = [
            new Head('codification', Head::TYPE_TEXT, trans('words.codification')),
            new Head('Ferme', Head::TYPE_TEXT, trans('words.Ferme')),
            new Head('superficie', Head::TYPE_TEXT, trans('words.superficie')),
            new Head('modeCulture', Head::TYPE_TEXT, trans('words.modeCulture')),
            new Head('topographie', Head::TYPE_TEXT, trans('words.topographie')),
            new Head('pente', Head::TYPE_TEXT, trans('words.pente')),
            new Head('pierosite', Head::TYPE_TEXT, trans('words.pierosite')),
            new Head('gps', Head::TYPE_TEXT, trans('words.gps')),
            new Head('description', Head::TYPE_TEXT, trans('words.description')),
            new Head('typeSol', Head::TYPE_TEXT, trans('words.typeSol')),
        ];

        // $collection = ModelTarget::all();
        $collection2 = ModelTarget::all();
        // $this->success(text: trans('messages.deleted_message'));
        // return view('crud.parcelle.index', compact(['actions', 'heads', 'collection']));
        return view('crud.Ferme.index', compact(['actions', 'heads', 'collection2']));
    }

    /***
     * Page create
     */
    public function create()
    {
        return view('crud.parcelle.create');
    }

    /***
     * Page edit
     */
    public function show(Request $request, $id)
    {
        $data = ModelTarget::query()->findOrFail($id);
        return view('crud.parcelle.edit', [
            'model' => $data
        ]);
    }

    /***
     * Delete multiple
     */
    //---------------------------------
    public function destroyGroup(Request $request)
    {
        $idp = $request['idp'] ?? [];
        foreach ($idp as $id) {
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
        return redirect(Route('parcelles.index'));
    }

    /***
     * Add a new record
     */
    public function store(ParcellesAdd $request)
    {
        $validated = $request->validated();
        $data = ModelTarget::query()
            ->create($validated);
        $data->update([]);
        $this->success(text: trans('messages.added_message'));
        return redirect(Route('parcelles.index'));
    }


    /***
     * Update record if exists
     */
    public function update(ParcellesAdd $request, $id)
    {
        $data = ModelTarget::query()->findOrFail($id);
        $validated = $request->validated();
        $data->update($validated);
        $this->success(text: trans('messages.updated_message'));
        return redirect(Route('parcelles.index'));
    }
}

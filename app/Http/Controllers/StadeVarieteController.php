<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use Illuminate\Http\Request;
use App\Http\Requests\StadeVarietes\Add as StadeVarieteAdd;
use App\Models\StadeVariete as ModelTarget;
use League\Flysystem\FilesystemException;


class StadeVarieteController extends Controller
{
    // protected function index()
    // {
    //     /***
    //      *  page index
    //      */
    //     $actions = [
    //         new Action(ucwords(trans('pages/stadeVarietes.add_a_new_stadeVariete')), Action::TYPE_NORMAL, url: route('stadeVarietes.create')),
    //         new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('stadeVarietes.destroyGroup'))
    //     ];
    //     $heads = [
    //         new Head('nom', Head::TYPE_TEXT, trans('pages/stadeVarietes.nom')),
    //         new Head('phaseFin', Head::TYPE_TEXT, trans('pages/stadeVarietes.phaseFin')),
    //         new Head('espece', Head::TYPE_TEXT, trans('pages/stadeVarietes.espece')),
    //         new Head('variete', Head::TYPE_TEXT, trans('pages/stadeVarietes.variete')),
    //         new Head('sommesTemps', Head::TYPE_TEXT, trans('pages/stadeVarietes.sommesTemps')),
    //         new Head('sommesTempFroid', Head::TYPE_TEXT, trans('pages/stadeVarietes.sommesTempFroid')),
    //         new Head('Kc', Head::TYPE_TEXT, trans('pages/stadeVarietes.Kc')),
    //         new Head('enracinement', Head::TYPE_TEXT, trans('pages/stadeVarietes.enracinement')),
    //         new Head('maxEnracinement', Head::TYPE_OPTIONS, trans('pages/stadeVarietes.maxEnracinement'),[
    //             'Y' => trans('words.yes'),
    //             'N' => trans('words.no'),
    //         ]),
    //         new Head('description', Head::TYPE_TEXT, trans('pages/stadeVarietes.description')),
    //     ];

    // $collection = ModelTarget::query()
    // ->join('varietes', 'varietes.idV', 'stadeVarietes.variete')
    // ->select('stadeVarietes.*', 'variete.nomCommercial as variete')
    // ->join('especes', 'especes.ide', 'stadeVarietes.espece')
    // ->select('stadeVarietes.*', 'especes.nomSc as espece')
    // ->get();
    //     $this->success(text: trans('messages.deleted_message'));
    //     return view('crud.stadeVariete.index', compact(['actions', 'heads', 'collection']));
    // }

    /***
     * Page create
     */
    public function create()
    {
        return view('crud.stadeVariete.create');
    }

    /***
     * Page edit
     */
    public function show(Request $request, $id)
    {
        $data = ModelTarget::query()->findOrFail($id);
        return view('crud.stadeVariete.edit', [
            'model' => $data
        ]);
    }

    /***
     * Delete multiple
     */
    //---------------------------------
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
    //----------------------------
    /***
     * Delete one record by id if exists
     */
    public function destroy(Request $request, $id)
    {
        ModelTarget::query()->findOrFail($id)->delete();
        $this->success(trans('messages.deleted_message'));
        return redirect(Route('varietes.index'));
    }

    /***
     * Add a new record
     */
    public function store(StadeVarieteAdd $request)
    {
        $validated = $request->validated();
        $data = ModelTarget::query()
            ->create($validated);
        $data->update([]);
        $this->success(text: trans('messages.added_message'));
        return redirect(Route('varietes.index'));
    }


    /***
     * Update record if exists
     */
    public function update(StadeVarieteAdd $request, $id)
    {
        $data = ModelTarget::query()->findOrFail($id);
        $validated = $request->validated();
        $data->update($validated);
        $this->success(text: trans('messages.updated_message'));
        return redirect(Route('varietes.index'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use Illuminate\Http\Request;
use App\Http\Requests\Stades\Add as StadeAdd;
use App\Models\Stade as ModelTarget;
use League\Flysystem\FilesystemException;


class StadeController extends Controller
{
    // protected function index()
    // {
    //     /***
    //      *  page index
    //      */
    //     $actions = [
    //         new Action(ucwords(trans('pages/stades.add_a_new_stade')), Action::TYPE_NORMAL, url: route('stades.create')),
    //         new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('stades.destroyGroup'))
    //     ];
    //     $heads = [
    //         new Head('nom', Head::TYPE_TEXT, trans('pages/stades.nom')),
    //         new Head('phaseFin', Head::TYPE_TEXT, trans('pages/stades.phaseFin')),
    //         new Head('espece', Head::TYPE_TEXT, trans('pages/stades.espece')),
    //         new Head('description', Head::TYPE_TEXT, trans('pages/stades.description')),
    //     ];

    // $collection = ModelTarget::query()
    // ->join('especes', 'especes.ide', 'stades.espece')
    // ->select('stades.*', 'especes.nomSc as espece')
    // ->get();
    //     $this->success(text: trans('messages.deleted_message'));
    //     return view('crud.stade.index', compact(['actions', 'heads', 'collection']));
    // }

    /***
     * Page create
     */
    public function create()
    {
        return view('crud.stade.create');
    }

    /***
     * Page edit
     */
    public function show(Request $request, $id)
    {
        $data = ModelTarget::query()->findOrFail($id);
        return view('crud.stade.edit', [
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
    public function store(StadeAdd $request)
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
    public function update(StadeAdd $request, $id)
    {
        $data = ModelTarget::query()->findOrFail($id);
        $validated = $request->validated();
        $data->update($validated);
        $this->success(text: trans('messages.updated_message'));
        return redirect(Route('varietes.index'));
    }

}

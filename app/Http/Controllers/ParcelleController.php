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
    /***
     * Page create
     */
    public function create(Request $request)
    {
        $fermeId = $request->get('id_ferme') ?? null;

        $pagesIndexes = [
            ['name' => 'Ajoute parcelle', 'current' => true],
        ];
        if ($request->has('back')) {
            array_unshift($pagesIndexes, [
                'name' => "page president", 'route' => $request->get('back'),
            ]);
        }

        return view('crud.parcelle.create', compact('pagesIndexes', 'fermeId'));
    }
    /***
     * Page edit
     */
    public function show(Request $request, $id)
    {
        $model = ModelTarget::query()->where(ModelTarget::PK, $id)->firstOrFail();

        $pagesIndexes = [
            ['name' => 'Modifier parcelle', 'current' => true],
        ];
        if ($request->has('back')) {
            array_unshift($pagesIndexes, [
                'name' => "page president", 'route' => $request->get('back'),
            ]);
        }
        return view('crud.parcelle.edit', compact('model', "pagesIndexes"));
    }
    /***
     * Delete multiple
     */
    //---------------------------------
    public function destroyGroup(Request $request)
    {
        
        $ids = $request['ids'] ?? [];
       foreach ($ids as $id) {
           $client = ModelTarget::query()->findOrFail($id);
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
        $model = ModelTarget::find($id);
        ModelTarget::find($id)->delete();
        // dd($id);
        
        $this->success(trans('messages.deleted_message'));
        return redirect(route('fermes.show' ,$model['Ferme']));
    }

    /***
     * Add a new record
     */
    public function store(ParcellesAdd $request)
    {
        $validated = $request->validated();
        $data = ModelTarget::query()->create($validated);
        $this->success(text: trans('messages.added_message'));
        return redirect(route('fermes.show', $data['Ferme']));
    }
    /***
     * Update record if exists
     */
    public function update(ParcellesAdd $request, $id)
    {
        $data = ModelTarget::query()->where(ModelTarget::PK, $id)->firstOrFail();
        
        $validated = $request->validated();
        $data->update($validated);
        $this->success(text: trans('messages.updated_message'));
        return redirect(route('fermes.show', $data['Ferme']));
    }

}

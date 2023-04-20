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
    // protected function index()
    // {
    //     /***
    //      *  page index
    //      */
    //     $actions = [
    //         new Action(ucwords(trans('pages/parcelles.add_a_new_parcelle')), Action::TYPE_NORMAL, url: route('parcelles.create')),
    //         new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('parcelles.destroyGroup'))
    //     ];
    //     $heads = [
    //         new Head('codification', Head::TYPE_TEXT, trans('pages/parcelles.codification')),
            // new Head('Ferme', Head::TYPE_TEXT, trans('pages/parcelles.Ferme')),
            // new Head('superficie', Head::TYPE_TEXT, trans('pages/parcelles.superficie')),
            // new Head('modeCulture', Head::TYPE_TEXT, trans('pages/parcelles.modeCulture')),
            // new Head('topographie', Head::TYPE_TEXT, trans('pages/parcelles.topographie')),
            // new Head('pente', Head::TYPE_TEXT, trans('pages/parcelles.pente')),
            // new Head('pierosite', Head::TYPE_TEXT, trans('pages/parcelles.pierosite')),
            // new Head('gps', Head::TYPE_TEXT, trans('pages/parcelles.gps')),
            // new Head('description', Head::TYPE_TEXT, trans('pages/parcelles.description')),
            // new Head('typeSol', Head::TYPE_TEXT, trans('pages/parcelles.typeSol')),
    //     ];

    //     // $collection = ModelTarget::all();
    //     // $this->success(text: trans('messages.deleted_message'));
    //     // return view('crud.parcelle.index', compact(['actions', 'heads', 'collection']));
    // }

    /***
     * Page create
     */
    public function create(Request $request)
    {
        // return view('crud.parcelle.create');
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
        // $data = ModelTarget::query()->findOrFail($id);
        // return view('crud.parcelle.edit', [
        //     'model' => $data
        // ]);
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
        // ModelTarget::query()->findOrFail($id)->delete();
        $model = ModelTarget::query()->where(ModelTarget::PK, $id)->firstOrFail();
        $idFerme = $model['ferme'];
        $this->success(trans('messages.deleted_message'));
        // return redirect(Route('fermes.index'));
        return redirect(route('ferme.show' , $idFerme));

    }

    /***
     * Add a new record
     */
    public function store(ParcellesAdd $request)
    {
        $validated = $request->validated();
        $data = ModelTarget::query()->create($validated);
        // $data->update([]);
        $this->success(text: trans('messages.added_message'));
        // return redirect(Route('fermes.index'));
        return redirect(route('fermes.show', $data['ferme']));

    }


    /***
     * Update record if exists
     */
    public function update(ParcellesAdd $request, $id)
    {
        // $data = ModelTarget::query()->findOrFail($id);
        $data = ModelTarget::query()->where(ModelTarget::PK, $id)->firstOrFail();
        $validated = $request->validated();
        $data->update($validated);
        $this->success(text: trans('messages.updated_message'));
        // return redirect(Route('fermes.index'));
        return redirect(route('fermes.show', $data['ferme']));
    }

}

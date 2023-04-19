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

    // protected function index()
    // {
    //     /***
    //      *  page index
    //      */
    //     $actions = [
    //         new Action(ucwords(trans('pages/typeSols.add_a_new_typesol')), Action::TYPE_NORMAL, url: route('typesols.create')),
    //         new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('typesols.destroyGroup'))
    //     ];
    //     $heads = [
    //         new Head('vernaculaure', Head::TYPE_TEXT, trans('pages/typeSols.vernaculaure')),
            // new Head('nomDomaine', Head::TYPE_TEXT, trans('pages/typeSols.nomDomaine')),
            // new Head('teneurArgile', Head::TYPE_TEXT, trans('pages/typeSols.teneurArgile')),
            // new Head('teneurLimon', Head::TYPE_TEXT, trans('pages/typeSols.teneurLimon')),
            // new Head('teneurSable', Head::TYPE_TEXT, trans('pages/typeSols.teneurSable')),
            // new Head('teneurPhosphore', Head::TYPE_TEXT, trans('pages/typeSols.teneurPhosphore')),
            // new Head('teneurPotassiume', Head::TYPE_TEXT, trans('pages/typeSols.teneurPotassiume')),
            // new Head('teneurAzote', Head::TYPE_TEXT, trans('pages/typeSols.teneurAzote')),
            // new Head('calcaireActif', Head::TYPE_TEXT, trans('pages/typeSols.calcaireActif')),
            // new Head('calcaireTotal', Head::TYPE_TEXT, trans('pages/typeSols.calcaireTotal')),
            // new Head('conductiveElectrique', Head::TYPE_TEXT, trans('pages/typeSols.conductiveElectrique')),
            // new Head('HCC', Head::TYPE_TEXT, trans('pages/typeSols.HCC')),
            // new Head('HPF', Head::TYPE_TEXT, trans('pages/typeSols.HPF')),
            // new Head('DA', Head::TYPE_TEXT, trans('pages/typeSols.DA')),
    //     ];

    //     $collection = ModelTarget::all();
    //     // $this->success(text: trans('messages.deleted_message'));
    //     // return view('crud.typesol.index', compact(['actions', 'heads', 'collection']));
    //     return view('crud.', compact(['actions', 'heads', 'collection']));
    // }

    /***
     * Page create
     */
    public function create(Request $request)
    {
        $fermeId = $request->get('id_ferme') ?? null;

        $pagesIndexes = [
            ['name' => 'Ajoute type de sol', 'current' => true],
        ];
        if ($request->has('back')) {
            array_unshift($pagesIndexes, [
                'name' => "page president", 'route' => $request->get('back'),
            ]);
        }

        return view('crud.typesol.create', compact('pagesIndexes', 'fermeId'));
    }

    /***
     * Page edit
     */
    public function show(Request $request, $id)
    {
        $model = ModelTarget::query()->where(ModelTarget::PK, $id)->firstOrFail();

        $pagesIndexes = [
            ['name' => 'Modifier type de sol', 'current' => true],
        ];
        if ($request->has('back')) {
            array_unshift($pagesIndexes, [
                'name' => "page president", 'route' => $request->get('back'),
            ]);
        }
        return view('crud.typesol.edit', compact('model', "pagesIndexes"));

        // $data = ModelTarget::query()->findOrFail($id);
        // return view('crud.typesol.edit', [
        //     'model' => $data
        // ]);
    }

    /***
     * Delete multi records
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
        return redirect(Route('fermes.index'));
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
        return redirect(Route('fermes.index'));
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
        return redirect(Route('fermes.index'));
    }
}

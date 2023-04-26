<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use Illuminate\Http\Request;
use App\Http\Requests\StadeVarietes\Add;
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
    public function create(Request $request)
    {
        $especeId = $request->get('id_espece') ?? null;
        $varieteId = $request->get('id_variete') ?? null;

        $pagesIndexes = [
            ['name' => 'Ajoute Stade Varietes', 'current' => true],
        ];
        if ($request->has('back')) {
            array_unshift($pagesIndexes, [
                'name' => "page president", 'route' => $request->get('back'),
            ]);
        }


        return view('crud.stadevariete.create', compact('pagesIndexes', 'varieteId'));
    }

    /***
     * Page edit
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, $id)
    {
        $model = ModelTarget::query()->where(ModelTarget::PK, $id)->firstOrFail();

        $pagesIndexes = [
            ['name' => 'Modifier Stade Varietes', 'current' => true],
        ];
        if ($request->has('back')) {
            array_unshift($pagesIndexes, [
                'name' => "page president", 'route' => $request->get('back'),
            ]);
        }
        return view('crud.stadevariete.edit', compact('model', "pagesIndexes"));
    }

    /***
     * Delete multi records
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    /***
     * Delete one record by id if exists
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, $id)
    {

        $model = ModelTarget::query()->where(ModelTarget::PK, $id)->firstOrFail();
        // $idEspece = $model['espece'];
        $idvariete = $model['variete'];
        $model->delete();
        $this->success(trans('messages.deleted_message'));
        return redirect(route('varietes.show' , $idvariete));
        // $idEspece));
    }

    /***
     * Add a new record
     * @param Add $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function store(Add $request)
    {
        $validated = $request->validated();
        $model = ModelTarget::query()->create($validated);
        $this->success(text: trans('messages.added_message'));
        return redirect(route('varietes.show', $model['variete']));
    }


    /***
     * Update record if exists
     * @param Add $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function update(Add $request, $id)
    {
        $model = ModelTarget::query()->where(ModelTarget::PK, $id)->firstOrFail();
        $validated = $request->validated();
        $model->update($validated);
        $this->success(text: trans('messages.updated_message'));
        return redirect(route('varietes.show', $model['variete']));
    }

}

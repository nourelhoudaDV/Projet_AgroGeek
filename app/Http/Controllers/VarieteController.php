<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Requests\AddVarietes;
use App\Models\Variete as ModelTarget;
use App\Models\Variete;
use App\Models\StadeVariete;
use Illuminate\Http\Request;

class VarieteController extends Controller
{
    /***
     *  page index
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    protected function index()
    {
        //Variete::factory(2)->create();

        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('varietes.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('varietes.destroyGroup'))
        ];
        $heads = [
            new Head('especes', Head::TYPE_TEXT, 'especes'),
            new Head('nomCommercial', Head::TYPE_TEXT, 'nom Commercial'),
            new Head('appelationAr', Head::TYPE_TEXT, 'appelation Ar'),
            new Head('quantite', Head::TYPE_TEXT, 'quantite'),
            new Head('precocite', Head::TYPE_TEXT, 'precocite'),
            new Head('resistance', Head::TYPE_TEXT, 'resistance'),
            new Head('competitivite', Head::TYPE_TEXT, 'competitivite'),
            new Head('description', Head::TYPE_TEXT, 'description'),
        ];

        $collection = ModelTarget::query()
            ->join('especes', 'especes.ide', 'varietes.espece')
            ->select('varietes.*', 'especes.nomSc as especes')
            ->get();
        // $collectionSV = StadeVariete::query()
        // ->join('varietes', 'varietes.idV', 'stadeVarietes.variete')
        // ->select('stadeVarietes.*', 'variete.nomCommercial as variete')
        // ->get();
        return view('crud.varietes.index', compact(['actions', 'heads', 'collection']));
        // , 'collectionSV']));
    }

    /***
     * Page create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('crud.varietes.create');
    }

    /***
     * Page edit
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, $id)
    {

        $model = ModelTarget::query()->with('stadevarietes')->where( ModelTarget::PK, $id )->firstOrFail();

        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('stadeVarietes.create' , [
                // 'id_espece' => $model[ModelTarget::PK],
                'id_variete' => $model[ModelTarget::PK],
                'back' => url()->current()
            ])),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('stadeVarietes.destroyGroup'))
        ];
        $heads = [
            new Head('nom' , Head::TYPE_TEXT, "nom"),
            new Head('phaseFin' , Head::TYPE_TEXT, 'phaseFin'),
            new Head('sommesTemp' , Head::TYPE_TEXT, 'sommesTemp'),
            new Head('sommesTempFroid' , Head::TYPE_TEXT, 'sommesTempFroid'),
            new Head('kc' , Head::TYPE_TEXT, 'kc'),
            new Head('enracinement' , Head::TYPE_TEXT, 'enracinement'),
            new Head('maxEnracinement' , Head::TYPE_TEXT, 'maxEnracinement'),
            new Head('description' , Head::TYPE_TEXT, "description"),
        ];
        
        return view('crud.varietes.edit', compact('model' , 'heads' , 'actions'));
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
        ModelTarget::query()->findOrFail($id)->delete();
        $this->success(trans('messages.deleted_message'));
        return redirect(route('varietes.show'));
    }

    /***
     * Add a new record
     * @param Add $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function store(AddVarietes $request)
    {
        $validated = $request->validated();
        $model = ModelTarget::query()->create($validated);
        $this->success(text: trans('messages.added_message'));

        return redirect(route('varietes.show', $model[ModelTarget::PK]));
    }



    /***
     * Update record if exists
     * @param Add $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function update(AddVarietes $request, $id)
    {
        $model = ModelTarget::query()->findOrFail($id);
        $validated = $request->validated();
        $model->update($validated);
        $this->success(text: trans('messages.updated_message'));
        return back();
    }
}

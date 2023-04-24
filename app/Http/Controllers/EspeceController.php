<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Requests\AddEspece;
use App\Http\Requests\AddSecteur;

use App\Models\Espece;
use App\Models\Filliere;
use App\Models\Espece as ModelTarget;
use App\Models\Secteur;
use App\Models\Stade;
use Illuminate\Http\Request;
use League\Flysystem\FilesystemException;

class EspeceController extends Controller
{

    /***
     *  page index
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    protected function index(Request $request)
    {


        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('especes.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('especes.destroyGroup'))
        ];
        $heads = [
            new Head('nomSc' , Head::TYPE_TEXT, "nom d'espece"),
            new Head('nomCommercial' , Head::TYPE_TEXT, 'nom commercial'),
            new Head('appelationAr' , Head::TYPE_TEXT, 'appelation Ar'),
            new Head('categorieEspece' , Head::TYPE_TEXT, "categorie d'espece"),
            new Head('typeEnracinement' , Head::TYPE_TEXT, 'type enracinement'),
            new Head('description' , Head::TYPE_TEXT, 'description'),
        ];


        $collection = ModelTarget::all();



        return view('crud.especes.index', compact(['actions', 'heads', 'collection']));
    }


    /***
     * Page create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('crud.especes.create');
    }

    /***
     * Page edit
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, $id)
    {

        $model = ModelTarget::query()->with('stades')->where( ModelTarget::PK, $id )->firstOrFail();

        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('stades.create' , [
                'id_espece' => $model[ModelTarget::PK],
                'back' => url()->current()
            ])),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('stades.destroyGroup'))
        ];
        $heads = [
            new Head('nom' , Head::TYPE_TEXT, "nom"),
            new Head('phaseFin' , Head::TYPE_TEXT, 'phaseFin'),
            new Head('description' , Head::TYPE_TEXT, "description"),
        ];


        return view('crud.especes.edit', compact('model' , 'heads' , 'actions'));
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
        return redirect(route('especes.index'));
    }

    /***
     * Add a new record
     * @param Add $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function store(AddEspece $request)
    {
        $validated = $request->validated();
        $model = ModelTarget::query()->create($validated);
        $this->success(text: trans('messages.added_message'));

        return redirect(route('especes.show', $model[ModelTarget::PK]));
    }


    /***
     * Update record if exists
     * @param Add $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function update(AddEspece $request, $id)
    {
        $model = ModelTarget::query()->findOrFail($id);
        $validated = $request->validated();
        $model->update($validated);
        $this->success(text: trans('messages.updated_message'));
        return back();
    }
}

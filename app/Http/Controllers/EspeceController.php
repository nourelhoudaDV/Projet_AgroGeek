<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Requests\Especes\Add;
use App\Models\Espece as ModelTarget;
use App\Models\Variete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EspeceController extends Controller
{
    /***
     *  page index
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    // protected function index()
    // {


    //     $actions = [
    //         new Action(ucwords(trans('pages/especes.add_a_new_espece')), Action::TYPE_NORMAL, url: route('especes.create')),
    //         new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('especes.destroyGroup'))
    //     ];
    //     $heads = [
    //         new Head('nomSc', Head::TYPE_TEXT, trans('pages/especes.nomSc')),
    //         new Head('nomCommercial', Head::TYPE_TEXT, trans('pages/especes.nomCommercial')),
    //         new Head('appelationAr', Head::TYPE_TEXT, trans('pages/especes.appelationAr')),
    //         new Head('categorieEspece', Head::TYPE_TEXT, trans('pages/especes.categorieEspece')),
    //         new Head('typeEnracinement', Head::TYPE_TEXT, trans('pages/especes.typeEnracinement')),
    //         new Head('description', Head::TYPE_TEXT, trans('pages/especes.description')),
    //     ];

    //     $collection = ModelTarget::all();
    //     $variete = Variete::all();
    //     $this->success(text: trans('messages.deleted_message'));
    //     return view('crud.especes.index', compact(['actions', 'heads', 'collection', 'variete']));
    // }

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
        $clinet = ModelTarget ::query()->findOrFail($id);
        return view('crud.especes.edit', [
            'model' => $clinet
        ]);
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
           $client = ModelTarget::query()->find((int)\Crypt::decrypt($id));
           $client?->delete();
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
        return Redirect()->route('varietes.index');
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

        // $nomSc = $request->validated()['nomSc'];
        // $nomCommercial = $request->validated()['nomCommercial'];
        // $appelationAr = $request->validated()['appelationAr'];
        // $categorieEspece = $request->validated()['categorieEspece'];
        // $typeEnracinement = $request->validated()['typeEnracinement'];
        // $description = $request->validated()['description'];


        $client = ModelTarget::query()
            ->create($validated);


        $client->update([
            // 'nomSc' => $nomSc,
            // 'nomCommercial' => $nomCommercial,
            // 'appelationAr' => $appelationAr,
            // 'categorieEspece' => $categorieEspece,
            // 'typeEnracinement' => $typeEnracinement,
            // 'description' => $description,
        ]);

        $this->success(text: trans('messages.added_message'));
        return Redirect()->route('varietes.index');
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
        $client = ModelTarget::query()->findOrFail($id);

        $validated = $request->validated();

        // $this->saveAndDeleteOld($request->validated()['nomSc'] ?? null, 'especes', $client, 'nomSc');
        // $this->saveAndDeleteOld($request->validated()['nomCommercial'] ?? null, 'especes', $client, 'nomCommercial');
        // $this->saveAndDeleteOld($request->validated()['appelationAr'] ?? null, 'especes', $client, 'appelationAr');
        // $this->saveAndDeleteOld($request->validated()['categorieEspece'] ?? null, 'especes', $client, 'categorieEspece');
        // $this->saveAndDeleteOld($request->validated()['typeEnracinement'] ?? null, 'especes', $client, 'typeEnracinement');
        // $this->saveAndDeleteOld($request->validated()['description'] ?? null, 'especes', $client, 'description');
        $client->update($validated);

        $this->success(text: trans('messages.updated_message'));
        return Redirect()->route('varietes.index');
    }
}


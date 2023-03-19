<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Requests\Fermes\Add;
use Illuminate\Http\Request;
use App\Models\Ferme as ModelTarget;
use Illuminate\Routing\Route;
use Symfony\Component\Routing\Route as RoutingRoute;

class FermeController extends Controller
{
    /***
     *  page index
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    protected function index()
    {


        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('fermes.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('fermes.destroyGroup'))
        ];
        $heads = [
            new Head('logo', Head::TYPE_IMG, trans('words.avatar')),
            new Head('nomDomaine', Head::TYPE_TEXT, trans('words.name')),
            new Head('fullNameG', Head::TYPE_TEXT,'fullNameG'),
            new Head('cin', Head::TYPE_TEXT,'cin'),
            new Head('contactG', Head::TYPE_TEXT, 'contactG'),
            new Head('SAT', Head::TYPE_TEXT, 'SAT'),
            new Head('SAU', Head::TYPE_TEXT, 'SAU'),
            new Head('observation', Head::TYPE_TEXT, 'observation'),
            new Head('fixe', Head::TYPE_TEXT, 'fixe'),
            new Head('fax', Head::TYPE_TEXT, 'fax'),
            new Head('GSM1', Head::TYPE_TEXT, 'GSM1'),
            new Head('GSM2', Head::TYPE_TEXT, 'GSM2'),
            new Head('email', Head::TYPE_TEXT, trans('words.email')),
            new Head('siteWeb', Head::TYPE_TEXT, 'siteWeb'),
            new Head('Douar', Head::TYPE_TEXT, 'Douar'),
            new Head('Cercle', Head::TYPE_TEXT, 'Circle'),
            new Head('province', Head::TYPE_TEXT, 'province'),
            new Head('region', Head::TYPE_TEXT, 'region'),
            new Head('adresse', Head::TYPE_TEXT, 'address'),
            new Head('gps', Head::TYPE_TEXT, 'gps'),
            new Head('ville', Head::TYPE_TEXT, 'city'),
        ];

        $collection = ModelTarget::all();
        $this->success(text: trans('messages.deleted_message'));
        return view('crud.Ferme.ferme.index', compact(['actions', 'heads', 'collection']));
    }

    /***
     * Page create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('crud.Ferme.ferme.create');
    }

    /***
     * Page edit
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, $id)
    {
        $clinet = ModelTarget::query()->findOrFail($id);
        return view('crud.Ferme.ferme.edit', [
            'model' => $clinet
        ]);
    }

    /***
     * Delete multi records
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
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
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, $id)
    {
        ModelTarget::query()->findOrFail($id)->delete();
        $this->success(trans('messages.deleted_message'));
        return redirect(Route('fermes.index'));
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

        $avatar = $request->validated()['avatar'] ?? null;
        // $logo = $request->validated()['logo'] ?? null;
        unset($validated['avatar']);
        // unset($validated['logo']);

        $client = ModelTarget::query()
            ->create($validated);


        $avatar = $this->saveFile('ferme', file: $avatar);
        // $logo = $this->saveFile('clients', file: $logo);

        $client->update([
            'avatar' => $avatar
            // 'logo' => $logo,
        ]);

        $this->success(text: trans('messages.added_message'));
        return redirect(Route('fermes.index'));
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
        // unset($validated['logo']);
        unset($validated['avatar']);
        $this->saveAndDeleteOld($request->validated()['avatar'] ?? null, 'ferme', $client, 'avatar');
        // $this->saveAndDeleteOld($request->validated()['logo'] ?? null, 'ferme', $client, 'logo');
        // $this->saveAndDeleteOld($request->validated()['logo'] ?? null, 'clients', $client, 'logo');
        $client->update($validated);

        $this->success(text: trans('messages.updated_message'));
        return redirect(Route('fermes.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Requests\Clients\Add;
use App\Http\Requests\Clients\edit;
use App\Models\Client as ModelTarget;
use App\Models\Sport;
use App\Models\User;
use App\Models\UserSport;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use League\Flysystem\FilesystemException;
use RealRashid\SweetAlert\Facades\Alert;

class ClientController extends Controller
{
    /***
     *  page index
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    protected function index()
    {


        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('clients.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('clients.destroyGroup'))
        ];
        $heads = [
            new Head('avatar', Head::TYPE_IMG, trans('words.avatar')),
            new Head('logo', Head::TYPE_IMG, trans('words.logo')),
            new Head('name', Head::TYPE_TEXT, trans('words.name')),
            new Head('birthday', Head::TYPE_TEXT, trans('words.birthday')),
            new Head('city', Head::TYPE_TEXT, trans('words.city')),
            new Head('country', Head::TYPE_TEXT, trans('words.country')),
            new Head('gender', Head::TYPE_TEXT, trans('words.gender')),
        ];

        $collection = ModelTarget::all();
        $this->success(text: trans('messages.deleted_message'));
        return view('pages.clients.index', compact(['actions', 'heads', 'collection']));
    }

    /***
     * Page create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('pages.clients.create');
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
        return view('pages.clients.edit', [
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
        return redirect(route('clients.index'));
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
        $logo = $request->validated()['logo'] ?? null;
        unset($validated['avatar']);
        unset($validated['logo']);

        $client = ModelTarget::query()
            ->create($validated);


        $avatar = $this->saveFile('clients', file: $avatar);
        $logo = $this->saveFile('clients', file: $logo);

        $client->update([
            'avatar' => $avatar,
            'logo' => $logo,
        ]);

        $this->success(text: trans('messages.added_message'));
        return redirect(route('clients.index'));
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
        unset($validated['logo']);
        unset($validated['avatar']);
        $this->saveAndDeleteOld($request->validated()['avatar'] ?? null, 'clients', $client, 'avatar');
        $this->saveAndDeleteOld($request->validated()['logo'] ?? null, 'clients', $client, 'logo');
        $client->update($validated);

        $this->success(text: trans('messages.updated_message'));
        return redirect(route('clients.index'));
    }
}

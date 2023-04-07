<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Requests\AddUserRequet;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\User as ModelTarget;
use League\Flysystem\FilesystemException;

class UserController extends Controller
{

    /***
     *  page index
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    protected function index()
    {

//        User::factory(1)->create();

        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('users.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('users.destroyGroup'))
        ];
        $heads = [
         
            new Head('avatar', Head::TYPE_IMG, trans('words.avatar')),
            new Head('full_name', Head::TYPE_TEXT, trans('words.name')),
            new Head('gender', Head::TYPE_OPTIONS, trans('words.gender'), [
                'M' => trans('words.man'),
                'W' => trans('words.woman'),
            ]),
            new Head('date_of_birth', Head::TYPE_DATE, trans('words.date')),
            new Head('country', Head::TYPE_TEXT, trans('words.country')),

        ];

        $collection = ModelTarget::query()
            ->join('countries', 'countries.id', 'users.country_id')
            ->select('users.*', 'countries.name as country')
            ->get();

        return view('crud.index', compact(['actions', 'heads', 'collection']));
    }

    /***
     * Page create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('crud.create');
    }

    /***
     * Page edit
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, $id)
    {
        $model = ModelTarget::query()->findOrFail($id);
        return view('crud.edit', [
            'model' => $model
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
        return redirect(route('users.index'));
    }

    /***
     * Add a new record
     * @param Add $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function store(AddUserRequet $request)
    {
        $validated = $request->validated();
        $avatar = $request->validated()['avatar'] ?? null;
        unset($validated['avatar']);

        $model = ModelTarget::query()->create($validated);
        $model->update([
            'avatar' => $this->saveFile('users', file: $avatar)
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
    public function update(AddUserRequet $request, $id)
    {

        $model = ModelTarget::query()->findOrFail($id);

        $validated = $request->validated();
        unset($validated['avatar']);

        $this->saveAndDeleteOld($request->validated()['avatar'] ?? null, 'users', $model, 'avatar');
        $model->update($validated);

        $this->success(text: trans('messages.updated_message'));
        return redirect(route('users.index'));
    }
}

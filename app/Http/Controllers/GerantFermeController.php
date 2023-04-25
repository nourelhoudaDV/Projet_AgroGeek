<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use League\Flysystem\FilesystemException;
use App\Models\GerantFerme;

use App\Models\GerantFerme as ModelTarget;
use App\Http\Requests\AddGrantFermesRequet;

use Illuminate\Http\Request;

class GerantFermeController extends Controller
{

    /***
     *  page index
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    protected function index()
    {
    //GerantFerme::factory(3)->create();


        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('GerantFermes.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('GerantFermes.destroyGroup'))
        ];
        $heads = [
         
            new Head('nomG', Head::TYPE_TEXT, trans('words.name')),
            new Head('prenomG', Head::TYPE_TEXT, trans('words.prenom')),
            new Head('cin', Head::TYPE_TEXT, trans('words.cin')),
            new Head('telephone', Head::TYPE_TEXT, trans('words.telephone')),
            new Head('email', Head::TYPE_TEXT, trans('words.email')),

        ];

        $collection = ModelTarget::all();
            //->join('countries', 'countries.id', 'users.country_id')
           // ->select('GerantFermes.*', 'countries.name as country')
            //->get();

        //return view('crudG.index', compact(['actions', 'heads', 'collection']));
        return view('crudG.index', compact(['actions', 'heads', 'collection']));

    }

    /***
     * Page create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('crudG.create');
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
        return view('crudG.edit', [
            'model' => $model
        ]);
    }

    /***
     * Delete multi records
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
   
        public function destroyGroup()
     {
        $GerantFermes = GerantFerme::all();
         foreach ($GerantFermes as $g) {
             $g->delete();
         }
         session()->success(text: trans('messages.updated_message'));
         return redirect()->route('GerantFermes.index');
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
        return redirect(route('GerantFermes.index'));
    }

    /***
     * Add a new record
     * @param Add $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function store(AddGrantFermesRequet $request)
    {
        $validated = $request->validated();

        $model = ModelTarget::query()->create($validated);
        $model->update();
        $this->success(text: trans('messages.added_message'));
        return redirect(route('GerantFermes.index'));
    }


    /***
     * Update record if exists
     * @param Add $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function update(AddGrantFermesRequet $request, $id)
    {

        $model = ModelTarget::query()->findOrFail($id);

        $validated = $request->validated();

        $model->update($validated);

        $this->success(text: trans('messages.updated_message'));
        return redirect(route('GerantFermes.index'));
    }
    // public function deleteAllUsers()
    // {
    //     $users = User::all();
    //     foreach ($users as $user) {
    //         $user->delete();
    //     }
    //     session()->success(text: trans('messages.updated_message'));
    //     return redirect()->route('users.index');
    // }
    
}

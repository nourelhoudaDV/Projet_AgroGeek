<?php

namespace App\Http\Controllers;

use App\Models\Stade as ModelTarget;
use App\Http\Requests\AddStade;
use Illuminate\Http\Request;

class StadeController extends Controller
{


    /***
     * Page create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        $especeId = $request->get('id_espece') ?? null;
        $pagesIndexes = [
            ['name' => 'Ajoute Stade', 'current' => true],
        ];
        if ($request->has('back')) {
            array_unshift($pagesIndexes, [
                'name' => "page president", 'route' => $request->get('back'),
            ]);
        }
        return view('crud.stades.create', compact('pagesIndexes', 'especeId'));
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
            ['name' => 'Modifier Stade', 'current' => true],
        ];
        if ($request->has('back')) {
            array_unshift($pagesIndexes, [
                'name' => "page president", 'route' => $request->get('back'),
            ]);
        }
        return view('crud.stades.edit', compact('pagesIndexes', 'model'));
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
        $idEspece = $model['espece'];
        $model->delete();
        $this->success(trans('messages.deleted_message'));
        return redirect(route('especes.show' , $idEspece));
    }

    /***
     * Add a new record
     * @param Add $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function store(AddStade $request)
    {
        $validated = $request->validated();
        $model = ModelTarget::query()->create($validated);
        $this->success(text: trans('messages.added_message'));
        return redirect(route('especes.show', $model['espece']));
    }


    /***
     * Update record if exists
     * @param Add $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function update(AddStade $request, $id)
    {
        $model = ModelTarget::query()->where(ModelTarget::PK, $id)->firstOrFail();
        $validated = $request->validated();
        $model->update($validated);
        $this->success(text: trans('messages.updated_message'));
        return redirect(route('especes.show', $model['espece']));
    }
}

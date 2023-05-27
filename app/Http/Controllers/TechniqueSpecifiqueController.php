<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Requests\AddTechniqueSpecifique;
use App\Models\ChargesTechSpe;
use App\Models\TechniqueSpecifique as ModelTarget;
use App\Models\TechniqueSpecifique;
use App\Models\StadeTechniqueSpecifique;
use Illuminate\Http\Request;

class TechniqueSpecifiqueController extends Controller
{
    /***
     *  page index
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
 

    /***
     * Page create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        $especeId = $request->get('idTA') ?? null;
        // dd($especeId);
        $pagesIndexes = [
            ['name' => 'Ajoute Stade', 'current' => true],
        ];
        if ($request->has('back')) {
            array_unshift($pagesIndexes, [
                'name' => "page president", 'route' => $request->get('back'),
            ]);
        }
        return view('crud.TechniqueSpecifique.create',compact('pagesIndexes', 'especeId'));
    }

    /***
     * Page edit
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, $id)
    {

        $model = ModelTarget::query()->where( ModelTarget::PK, $id )->firstOrFail();
        $collection = ChargesTechSpe::query()
        ->join('techniques_specifiques', 'charges_tech_spe.idTechFK', 'techniques_specifiques.idTS')
        ->where('techniques_specifiques.idTS',$id)
        ->select('charges_tech_spe.*', 'techniques_specifiques.titre as TechniqueSpecifique')
        ->get();

        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('ChargesTechSpe.create' , [
                // 'id_espece' => $model[ModelTarget::PK],
                'id_TechniqueSpecifique' => $model[ModelTarget::PK],
                'back' => url()->current()
            ])),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('ChargesTechSpe.destroyGroup'))
        ];
        $heads = [
            new Head('logo' , Head::TYPE_TEXT, "logo"),
            new Head('titre' , Head::TYPE_TEXT, "titre"),
           
            new Head('description' , Head::TYPE_TEXT, "description"),
        ];
        
        return view('crud.TechniqueSpecifique.edit', compact('model' , 'heads' , 'actions','collection'));
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
            $model = ModelTarget::query()->findOrFail($id);
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
        return redirect()->back();

    }

    /***
     * Add a new record
     * @param Add $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function store(AddTechniqueSpecifique $request)
    {
        $validated = $request->validated();
        $logo = $request->validated()['logo'] ?? null;
        unset($validated['logo']);

        $model = ModelTarget::query()->create($validated);
        $model->update([
            'logo' => $this->saveFile('techniqueSp', file: $logo)
        ]);
        $this->success(text: trans('messages.added_message'));
        return redirect(route('TechniqueSpecifique.show',$model['idTS']));
    }



    /***
     * Update record if exists
     * @param Add $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function update(AddTechniqueSpecifique $request, $id)
    {
        $model = ModelTarget::query()->findOrFail($id);

        $validated = $request->validated();
        unset($validated['logo']);

        $this->saveAndDeleteOld($request->validated()['logo'] ?? null, 'techniqueSp', $model, 'logo');
        $model->update($validated);

        $this->success(text: trans('messages.updated_message'));
        return redirect(route('TechniqueSpecifique.show',$model['idTS']));

    }
}

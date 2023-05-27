<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Requests\Addcharge;
use App\Http\Requests\AddTechniqueSpecifique;
use App\Models\ChargesTechSpe;
use App\Models\ChargesTechSpe as ModelTarget;
use Illuminate\Http\Request;

class ChargesTechSpeController extends Controller
{
    /***
     *  page index
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    protected function index()
    {
        //Variete::factory(2)->create();

        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('TechniqueSpecifique.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('TechniqueSpecifique.destroyGroup'))
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
            ->join('especes', 'especes.ide', 'TechniqueSpecifique.espece')
            ->select('TechniqueSpecifique.*', 'especes.nomSc as especes')
            ->get();
        // $collectionSV = StadeVariete::query()
        // ->join('TechniqueSpecifique', 'TechniqueSpecifique.idV', 'stadeTechniqueSpecifique.variete')
        // ->select('stadeTechniqueSpecifique.*', 'variete.nomCommercial as variete')
        // ->get();
        return view('crud.TechniqueSpecifique.index', compact(['actions', 'heads', 'collection']));
        // , 'collectionSV']));
    }

    /***
     * Page create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        // $especeId = $request->get('id_espece') ?? null;
        $especeId = 1;
        $pagesIndexes = [
            ['name' => 'Ajoute Stade', 'current' => true],
        ];
        if ($request->has('back')) {
            array_unshift($pagesIndexes, [
                'name' => "page president", 'route' => $request->get('back'),
            ]);
        }
        return view('crud.ChargesTechSpe.create',compact('pagesIndexes', 'especeId'));
    }

    /***
     * Page edit
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, $id)
    {

        $model = ModelTarget::findOrFail($id);

        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('TechniqueSpecifique.create' , [
                // 'id_espece' => $model[ModelTarget::PK],
                'id_variete' => $model[ModelTarget::PK],
                'back' => url()->current()
            ])),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('TechniqueSpecifique.destroyGroup'))
        ];
        $heads = [
            new Head('logo' , Head::TYPE_IMG, "logo"),
            new Head('titre' , Head::TYPE_TEXT, "titre"),
           
            new Head('description' , Head::TYPE_TEXT, "description"),
        ];
        
        return view('crud.ChargesTechSpe.edit', compact('model' , 'heads' , 'actions'));
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
        $model=ModelTarget::query()->findOrFail($id);
        ModelTarget::query()->findOrFail($id)->delete();
        $this->success(trans('messages.deleted_message'));
        return redirect(route('TechniqueSpecifique.show', $model['idTechFK']));
    }

    /***
     * Add a new record
     * @param Add $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function store(Addcharge $request)
    {
        $validated = $request->validated();
        // dd($validated);
        $model = ModelTarget::query()->create($validated);      
        $this->success(text: trans('messages.added_message'));
        return redirect(route('TechniqueSpecifique.show', $model['idTechFK']));
    }



    /***
     * Update record if exists
     * @param Add $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function update(Addcharge $request, $id)
    {
        $model = ModelTarget::query()->findOrFail($id);
        $validated = $request->validated();
        $model->update($validated);
        $this->success(text: trans('messages.updated_message'));
        return redirect(route('TechniqueSpecifique.show', $model['idTechFK']));

    }
}

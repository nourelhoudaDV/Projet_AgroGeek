<?php

namespace App\Http\Controllers;
use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Requests\TechniquesAgricoleRequet;
use App\Models\ModesTechnique;
use App\Models\Qualifications;
use App\Models\TechniqueAgricole as ModelTarget;
use App\Models\TechniqueSpecifique;
use App\Models\TypeMateriel;
use Illuminate\Http\Request;

class TechniquesAgricoleController extends Controller
{
    public function index()
    {
        $actions = [
            new Action('Ajouter', Action::TYPE_NORMAL, route('TechniquesAgricole.create')),
            new Action('supprimer tout', Action::TYPE_DELETE_ALL ,  route('TechniquesAgricole.destroyGroup')),
        ];
        $heads = [
            new Head('logo', Head::TYPE_IMG, 'logo'),
            new Head('titre', Head::TYPE_TEXT,'titre' ),
            new Head('decription', Head::TYPE_TEXT,'decription'),
        ];
        $collection = ModelTarget::all();
        return view('crud.techniquesAgricole.index', compact('actions', 'heads', 'collection'));
    }

 /***
     * Page create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('crud.techniquesAgricole.create');
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

   

        $data = [


            'ModesTechniques' =>[

                    'collection' => ModesTechnique::query()->where('idTechFK' , $model[ModelTarget::PK])->get() , 
                    'actions' => [
                        new Action('Ajouter', Action::TYPE_NORMAL, url: route('ModesTechnique.create' , ['idTA' => $model[ModelTarget::PK]])),
                        new Action('supprimer tout', Action::TYPE_DELETE_ALL , url: route('ModesTechnique.destroyGroup')),
                    ] ,
                    'heads' => [
                    
                        new Head('titre', Head::TYPE_TEXT,'titre' ),
                        new Head('description', Head::TYPE_TEXT,'description' ),
                    ],
            ] ,

            'Qualifications' => [

                    'collection' => Qualifications::query()->where('idTechFK' , $model[ModelTarget::PK])->get() , 
                    'actions' => [
                        new Action('Ajouter', Action::TYPE_NORMAL, url: route('qualifications.create' ,['idTA' => $model[ModelTarget::PK]])),
                        new Action('supprimer tout', Action::TYPE_DELETE_ALL , url: route('qualifications.destroyGroup')),
                    ] ,
                    'heads' => [
                        new Head('logo', Head::TYPE_IMG, 'logo'),
                        new Head('titre', Head::TYPE_TEXT,'titre' ),
                        new Head('unite', Head::TYPE_TEXT,'description' ),
                        new Head('description', Head::TYPE_TEXT,'description' ),
                    ],

            ],


            'typeMateriel' => [

                    'collection' => TypeMateriel::query()->where('idTechFK' , $model[ModelTarget::PK])->get() , 
                    'actions' => [
                        new Action('Ajouter', Action::TYPE_NORMAL, url: route('typeMateriel.create', ['idTA' => $model[ModelTarget::PK]])),
                        new Action('supprimer tout', Action::TYPE_DELETE_ALL , url: route('typeMateriel.destroyGroup')),
                    ] ,
                    'heads' => [
                    
                        new Head('logo', Head::TYPE_IMG, 'logo'),
                        new Head('titre', Head::TYPE_TEXT,'titre' ),
                        new Head('description', Head::TYPE_TEXT,'description' ),

                    ],
                ],
                
                'techniquesSpecifiques' => [

                        'collection' => TechniqueSpecifique::query()->where('idTechFK' , $model[ModelTarget::PK])->get() , 
                        'actions' => [
                            new Action('Ajouter', Action::TYPE_NORMAL, url: route('TechniqueSpecifique.create' ,['idTA' => $model[ModelTarget::PK]])),
                            new Action('supprimer tout', Action::TYPE_DELETE_ALL , url: route('TechniqueSpecifique.destroyGroup')),
                        ] ,
                        'heads' => [
                        
                            new Head('logo', Head::TYPE_IMG, 'logo'),
                            new Head('titre', Head::TYPE_TEXT,'titre' ),
                            new Head('description', Head::TYPE_TEXT,'description' ),
        
                        ],
                    ],
            



            ];
      
        return view('crud.techniquesAgricole.edit', [
            'model' => $model,
            'data' => $data
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
    public function store(TechniquesAgricoleRequet $request)
    {
        $validated = $request->validated();
        $avatar = $request->validated()['logo'] ?? null;
        unset($validated['logo']);

    
        $model = ModelTarget::query()->create($validated);
        $model->update([
            'logo' => $this->saveFile('TechniquesAgricole', file: $avatar)
        ]);
        $this->success(text: trans('messages.added_message'));
        return redirect()->route('TechniquesAgricole.show' , ['id' => $model[ModelTarget::PK]]);
    }


    /***
     * Update record if exists
     * @param Add $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function update(TechniquesAgricoleRequet $request, $id)
    {

        $model = ModelTarget::query()->findOrFail($id);

        $validated = $request->validated();
        unset($validated['logo']);

        $this->saveAndDeleteOld($request->validated()['logo'] ?? null, 'TechniquesAgricole', $model, 'logo');
        $model->update($validated);

        $this->success(text: trans('messages.updated_message'));
        return redirect()->route('TechniquesAgricole.show' , ['id' => $model[ModelTarget::PK]]);
    }

}

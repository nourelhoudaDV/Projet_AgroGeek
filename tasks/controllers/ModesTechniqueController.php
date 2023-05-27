<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Requests\modesTechniqueRequet;
use Illuminate\Http\Request;
use App\Models\ModesTechnique as ModelTarget; 
class ModesTechniqueController extends Controller
{

 /***
     * Page create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        $idta = $request['idTA'] ?? null ;
        return view('crud.modesTechnique.create' , compact('idta'));
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

        return view('crud.modesTechnique.edit', [
            'model' => $model,
  
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
    public function store(modesTechniqueRequet $request)
    {
        $validated = $request->validated() ;
      
        $validated['idTechFK'] = $request['idTA'];

        ModelTarget::query()->create($validated);
    
        $this->success(text: trans('messages.added_message'));
        return redirect()->route('TechniquesAgricole.show' , ['id' => $request['idTA']]);
    }


    /***
     * Update record if exists
     * @param Add $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function update(modesTechniqueRequet $request, $id)
    {
         $validated = $request->validated();

        $model = ModelTarget::query()->findOrFail($id);
        
        $model->update($validated);

        $this->success(text: trans('messages.updated_message'));
        return redirect()->route('TechniquesAgricole.show' , ['id' => $model['idTechFK']]);
    }

}

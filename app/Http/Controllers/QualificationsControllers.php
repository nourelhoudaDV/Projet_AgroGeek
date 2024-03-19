<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\qualificationsRequet;
use App\Models\Qualifications as ModelTarget;

class QualificationsControllers extends Controller
{
   
    public function create(Request $request)
    {
        $idta = $request['idTA'] ?? null ;
        return view('crud.qualifications.create' , compact('idta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(qualificationsRequet $request)
    {
        $validated = $request->validated() ;
      
        $validated['idTechFK'] = $request['idTA'];

        $avatar = $request->validated()['logo'] ?? null;

        unset($validated['logo']);
        $model= ModelTarget::query()->create($validated);

        $model->update([
            'logo' => $this->saveFile('qualifications', file: $avatar)
        ]);
        
        $this->success(trans('messages.added_message'));
        return redirect()->route('TechniquesAgricole.show' , ['id' => $request['idTA'] ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = ModelTarget::findOrFail($id);
        return view('crud.qualifications.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(qualificationsRequet $request, $id)
    {
        $model = ModelTarget::findOrFail($id);
        $validated = $request->validated();
        unset($validated['logo']);

        $this->saveAndDeleteOld($request->validated()['logo'] ?? null, 'qualifications', $model, 'logo');
        $model->update($validated);
        $this->success(text: trans('messages.updated_message'));
        return redirect()->route('TechniquesAgricole.show' , ['id' => $model['idTechFK']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        ModelTarget::findOrFail($id)->delete();
        $this->success(trans('messages.deleted_message'));
        return redirect()->back();
    }
    public function destroyGroup(Request $request)
    {
        $ids = $request['ids'] ?? [];
        foreach ($ids as $id) {
            $qualification = ModelTarget::findOrFail($id);
            $qualification?->delete();
        }
        $this->success(text: trans('messages.deleted_message'));
        return response()->json(['success' => true]);
    }
}

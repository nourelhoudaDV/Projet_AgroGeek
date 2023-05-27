<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Http\Requests\TypeMaterielRequest;
use Illuminate\Http\Request;
use App\Models\TypeMateriel as ModelTarget;
use League\Flysystem\FilesystemException;

class TypeMaterielController extends Controller
{
    /**
     * Afficher la page de création
     */
    public function create(Request $request)
    {
        $idta = $request['idTA'] ?? null ;
        return view('crud.typemateriel.create' , compact('idta'));
    }

    /**
     * Afficher la page d'édition
     */
    public function show(Request $request, $id)
    {
        $data = ModelTarget::query()->findOrFail($id);
        return view('crud.typemateriel.edit', [
            'model' => $data
        ]);
    }

    /**
     * Supprimer plusieurs enregistrements
     */
    public function destroyGroup(Request $request)
    {
        $ids = $request['ids'] ?? [];
        foreach ($ids as $id) {
            $typeMateriel = ModelTarget::query()->findOrFail($id);
            $typeMateriel?->delete();
        }
        $this->success(text: trans('messages.deleted_message'));
        return response()->json(['success' => true]);
    }

    /**
     * Supprimer un enregistrement par son ID s'il existe
     */
    public function destroy(Request $request, $id)
    {
        ModelTarget::query()->findOrFail($id)->delete();
        $this->success(trans('messages.deleted_message'));
        return redirect()->back();
    }

    /**
     * Ajouter un nouvel enregistrement
     */
    public function store(TypeMaterielRequest $request)
    {
        $validated = $request->validated();
        $avatar = $request->validated()['logo'] ?? null;
        $validated['idTechFK'] = $request['idTA'];
        unset($validated['logo']);
        $data = ModelTarget::query()->create($validated);
        $data->update([
            'logo' => $this->saveFile('TypeMateriel', file: $avatar)
        ]);
        $this->success(text: trans('messages.added_message'));
        return redirect()->route('TechniquesAgricole.show' , ['id' => $request['idTA'] ]);
    }

    /**
     * Mettre à jour un enregistrement s'il existe
     */
    public function update(TypeMaterielRequest $request, $id)
    {
        $data = ModelTarget::query()->findOrFail($id);
        $validated = $request->validated();
        unset($validated['logo']);

        $this->saveAndDeleteOld($request->validated()['logo'] ?? null, 'TypeMateriel', $data, 'logo');
        $data->update($validated);
        $this->success(text: trans('messages.updated_message'));
        return redirect()->route('TechniquesAgricole.show' , ['id' => $data['idTechFK']]);
    }
}

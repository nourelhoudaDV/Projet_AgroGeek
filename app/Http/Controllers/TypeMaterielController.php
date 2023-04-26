<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use Illuminate\Http\Request;
use App\Http\Requests\TypeMateriel\Add as TypeMaterielAdd;
use App\Models\TypeMateriel as ModelTarget;
use League\Flysystem\FilesystemException;

class TypesMaterielController extends Controller
{
    /**
     * Afficher la page de création
     */
    public function create()
    {
        return view('crud.typesMateriel.create');
    }

    /**
     * Afficher la page d'édition
     */
    public function show(Request $request, $id)
    {
        $data = ModelTarget::query()->findOrFail($id);
        return view('crud.typesMateriel.edit', [
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
            $typeMateriel = ModelTarget::query()->find((int)\Crypt::decrypt($id));
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
        return redirect(Route('typesMateriel.index'));
    }

    /**
     * Ajouter un nouvel enregistrement
     */
    public function store(TypeMaterielAdd $request)
    {
        $validated = $request->validated();
        $data = ModelTarget::query()->create($validated);
        $this->success(text: trans('messages.added_message'));
        return redirect(Route('typesMateriel.index'));
    }

    /**
     * Mettre à jour un enregistrement s'il existe
     */
    public function update(TypesMaterielAdd $request, $id)
    {
        $data = ModelTarget::query()->findOrFail($id);
        $validated = $request->validated();
        $data->update($validated);
        $this->success(text: trans('messages.updated_message'));
        return redirect(Route('typesMateriel.index'));
    }
}

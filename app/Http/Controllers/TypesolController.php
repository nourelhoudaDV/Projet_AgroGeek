<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use Illuminate\Http\Request;
use App\Http\Requests\Typesols\Add as TypesolsAdd;
use App\Models\Typesol as ModelTarget;
use Illuminate\Support\Facades\DB;
use League\Flysystem\FilesystemException;


class TypesolController extends Controller
{
    /***
     * Page create
     */
    public function create(Request $request)
    {
        $fermeId = $request->get('id_ferme') ?? null;

        $pagesIndexes = [
            ['name' => 'Ajoute type de sol', 'current' => true],
        ];
        if ($request->has('back')) {
            array_unshift($pagesIndexes, [
                'name' => "page president", 'route' => $request->get('back'),
            ]);
        }

        return view('crud.typesol.create', compact('pagesIndexes', 'fermeId'));
    }
    /***
     * Page edit
     */
    public function show(Request $request, $id)
    {
        $model = ModelTarget::query()->where(ModelTarget::PK, $id)->firstOrFail();

        $pagesIndexes = [
            ['name' => 'Modifier type de sol', 'current' => true],
        ];
        if ($request->has('back')) {
            array_unshift($pagesIndexes, [
                'name' => "page president", 'route' => $request->get('back'),
            ]);
        }
        return view('crud.typesol.edit', compact('model', "pagesIndexes"));
    }
    /***
     * Delete multi records
     */
    //---------------------------------
    public function destroyGroup(Request $request)
    {
        $ids = $request['ids'] ?? [];
       foreach ($ids as $id) {
           $client = ModelTarget::query()->find((int)\Crypt::decrypt($id));
           $client?->delete();
        }
        $this->success(text: trans('messages.deleted_message'));
        return response()->json(['success' => true]);
    }
    //----------------------------
    /***
     * Delete one record by id if exists
     */
    public function destroy(Request $request, $id)
    {
        ModelTarget::query()->findOrFail($id)->delete();
        $idFerme = ModelTarget::query()
        ->select('parcelles.Ferme as laravel_through_key')
        ->join('parcelles','typesols.idTS', 'parcelles.typeSol')
        ->where('typesols.idTS', $id)
        ->get();
        $this->success(trans('messages.deleted_message'));
        return redirect(Route('fermes.show',$idFerme));
    }
    /***
     * Add a new record
     */
    public function store(TypesolsAdd $request)
    {
        $validated = $request->validated();
        $data = ModelTarget::query()->create($validated);
        $idFerme = ModelTarget::query()
        ->select('parcelles.Ferme as laravel_through_key')
        ->join('parcelles','typesols.idTS', 'parcelles.typeSol')
        ->where(ModelTarget::PK, $data['idTS'])
        ->get();
        $data->update([]);
        dd($idFerme);
        $this->success(text: trans('messages.added_message'));
        return redirect(Route('fermes.show', $idFerme));
    }
    /***
     * Update record if exists
     */
    public function update(TypesolsAdd $request, $id)
    {
        $data = ModelTarget::query()->findOrFail($id);
        $idFerme = ModelTarget::query()
        ->select('parcelles.Ferme as laravel_through_key')
        ->join('parcelles','typesols.idTS', 'parcelles.typeSol')
        ->where('typesols.idTS', $id)
        ->get();
        $validated = $request->validated();
        $data->update($validated);
        $this->success(text: trans('messages.updated_message'));
        return redirect(Route('fermes.show', $idFerme));
    }
}

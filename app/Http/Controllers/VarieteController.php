<?php

namespace App\Http\Controllers;

use App\Helpers\Components\Action;
use App\Helpers\Components\Head;
use App\Models\Variete as ModelTarget;
use Illuminate\Http\Request;
use App\Http\Requests\Varietes\Add;
use App\Models\Espece;
use App\Models\Stade;
use App\Models\StadeVariete;

class VarieteController extends Controller
{
    /***
     *  page index
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    protected function index()
    {
        //Variete::factory(2)->create();

        $actions = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('varietes.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('varietes.destroyGroup'))
        ];
        $heads = [
            new Head('especes_id', Head::TYPE_TEXT, trans('words.especes_id')),
            new Head('nomCommercial', Head::TYPE_TEXT, trans('words.nomCommercial')),
            new Head('appelationAr', Head::TYPE_TEXT, trans('words.appelationAr')),
            new Head('qualite', Head::TYPE_TEXT, trans('words.qualite')),
            new Head('precocite', Head::TYPE_TEXT, trans('words.precocite')),
            new Head('resistance', Head::TYPE_TEXT, trans('words.resistance')),
            new Head('competitivite', Head::TYPE_TEXT, trans('words.competitivite')),
            new Head('description', Head::TYPE_TEXT, trans('words.description')),
        ];

        $collection = ModelTarget::query()
            ->join('especes', 'especes.ide', 'varietes.espece')
            ->select('varietes.*', 'especes.nomSc as espece')
            ->get();

        $actionsE = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('especes.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('especes.destroyGroup'))
        ];
        $headsE = [
            new Head('nomSc', Head::TYPE_TEXT, trans('words.nomSc')),
            new Head('nomCommercial', Head::TYPE_TEXT, trans('words.nomCommercial')),
            new Head('appelationAr', Head::TYPE_TEXT, trans('words.appelationAr')),
            new Head('categorieEspece', Head::TYPE_TEXT, trans('words.categorieEspece')),
            new Head('typeEnracinement', Head::TYPE_TEXT, trans('words.typeEnracinement')),
            new Head('description', Head::TYPE_TEXT, trans('words.description')),
        ];

        $collectionE = Espece::all();

        $actionsS = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('stades.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('stades.destroyGroup'))
        ];
        $headsS = [
            new Head('nom', Head::TYPE_TEXT, trans('words.nom')),
            new Head('phaseFin', Head::TYPE_TEXT, trans('words.phaseFin')),
            new Head('espece', Head::TYPE_TEXT, trans('words.espece')),
            new Head('description', Head::TYPE_TEXT, trans('words.description')),
        ];

        $collectionS = Stade::query()
        ->join('especes', 'especes.ide', 'stades.espece')
        ->select('stades.*', 'especes.nomSc as espece')
        ->get();

        $actionsSV = [
            new Action(ucwords(trans('words.add')), Action::TYPE_NORMAL, url: route('stadeVarietes.create')),
            new Action(ucwords(trans('words.delete_all')), Action::TYPE_DELETE_ALL, url: route('stadeVarietes.destroyGroup'))
        ];
        $headsSV = [
            new Head('nom', Head::TYPE_TEXT, trans('words.nom')),
            new Head('phaseFin', Head::TYPE_TEXT, trans('words.phaseFin')),
            new Head('espece', Head::TYPE_TEXT, trans('words.espece')),
            new Head('variete', Head::TYPE_TEXT, trans('words.variete')),
            new Head('sommesTemps', Head::TYPE_TEXT, trans('words.sommesTemps')),
            new Head('sommesTempFroid', Head::TYPE_TEXT, trans('words.sommesTempFroid')),
            new Head('Kc', Head::TYPE_TEXT, trans('words.Kc')),
            new Head('enracinement', Head::TYPE_TEXT, trans('words.enracinement')),
            new Head('maxEnracinement', Head::TYPE_OPTIONS, trans('words.maxEnracinement'),[
                'Y' => trans('words.OUI'),
                'N' => trans('words.NON'),
            ]),
            new Head('description', Head::TYPE_TEXT, trans('words.description')),
        ];

        $collectionSV = StadeVariete::query()
        ->join('varietes', 'varietes.idV', 'stadeVarietes.variete')
        ->select('stadeVarietes.*', 'variete.nomCommercial as variete')
        ->join('especes', 'especes.ide', 'stadeVarietes.espece')
        ->select('stadeVarietes.*', 'especes.nomSc as espece')
        ->get();

        $espece = ['actionsE', 'headsE', 'collectionE'];
        $stade = ['actionsS', 'headsS', 'collectionS'];
        $stadeVariete = ['actionsSV', 'headsSV', 'collectionSV'];
        return view('crud.varietes.index', compact(['actions', 'heads', 'collection',$espece,$stade,$stadeVariete]));
    }

    /***
     * Page create
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('crud.varietes.create');
    }

    /***
     * Page edit
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, $id)
    {
        $clinet = ModelTarget::query()->findOrFail($id);
        return view('crud.varietes.edit', [
            'model' => $clinet
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
           $client = ModelTarget::query()->find((int)\Crypt::decrypt($id));
           $client?->delete();
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
        return Redirect()->route('varietes.index');
    }

    /***
     * Add a new record
     * @param Add $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function store(Add $request)
    {
        $validated = $request->validated();

        $especes = $request->validated()['especes_id'];
        $com = $request->validated()['nomCommercial'];
        $appelationAr = $request->validated()['appelationAr'];
        $quantite = $request->validated()['qualite'];
        $precocite = $request->validated()['precocite'];
        $resistance = $request->validated()['resistance'];
        $competitivite = $request->validated()['competitivite'];
        $description = $request->validated()['description'];


        $client = ModelTarget::query()
            ->create($validated);


        $client->update([
            'especes_id' => $especes,
            'nomCommercial' => $com,
            'appelationAr' => $appelationAr,
            'quantite' => $quantite,
            'precocite' => $precocite,
            'resistance' => $resistance,
            'competitivite' => $competitivite,
            'description' => $description,
        ]);

        $this->success(text: trans('messages.added_message'));
        return Redirect()->route('varietes.index');
    }


    /***
     * Update record if exists
     * @param Add $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws FilesystemException
     */
    public function update(Add $request, $id)
    {
        $client = ModelTarget::query()->findOrFail($id);

        $validated = $request->validated();

        $this->saveAndDeleteOld($request->validated()['especes_id'] ?? null, 'varietes', $client, 'especes_id');
        $this->saveAndDeleteOld($request->validated()['nomCommercial'] ?? null, 'varietes', $client, 'nomCommercial');
        $this->saveAndDeleteOld($request->validated()['appelationAr'] ?? null, 'varietes', $client, 'appelationAr');
        $this->saveAndDeleteOld($request->validated()['qualite'] ?? null, 'varietes', $client, 'quantite');
        $this->saveAndDeleteOld($request->validated()['precocite'] ?? null, 'varietes', $client, 'precocite');
        $this->saveAndDeleteOld($request->validated()['resistance'] ?? null, 'varietes', $client, 'resistance');
        $this->saveAndDeleteOld($request->validated()['competitivite'] ?? null, 'varietes', $client, 'competitivite');
        $this->saveAndDeleteOld($request->validated()['description'] ?? null, 'varietes', $client, 'description');
        $client->update($validated);

        $this->success(text: trans('messages.updated_message'));
        return Redirect()->route('varietes.index');
    }
}

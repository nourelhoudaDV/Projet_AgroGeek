@extends('layout.master')
@include('include.blade-components')

@section('page_title', trans('pages/fermes.edit_page_title'))
@section('breadcrumb')
    <x-group.bread-crumb page-tittle="{{ trans('pages/fermes.edit_page_title') }}" :indexes="[
        ['name' => trans('pages/fermes.index_page_title'), 'route' => route('fermes.index')],
        ['name' => trans('pages/fermes.update_ferme'), 'current' => true],
    ]" />
@endsection


@section('content')

    @bind($model)
        <x-form.form method="post" action="{{ route('fermes.update', $model[$model::PK]) }}">

                <x-form.card col="col-12 row" title="{{ trans('pages/fermes.id_ferme') }}">

                    <x-form.input col="col-12 col-sm-6" name="nomDomaine" label="{{ trans('pages/fermes.nomDomaine') }}" />
                    <x-form.input col="col-12 col-sm-6" name="fullNameG" label="{{ trans('pages/fermes.fullNameG') }}" />
                    <x-form.input col="col-12 col-sm-3" name="cin" label="{{ trans('pages/fermes.cin') }}" />
                    <x-form.input col="col-12 col-sm-3" name="contactG" label="{{ trans('pages/fermes.contactG') }}" />
                    <x-form.input col="col-12 col-sm-3" name="SAT" label="{{ trans('pages/fermes.SAT') }}" />
                    <x-form.input col="col-12 col-sm-3" name="SAU" label="{{ trans('pages/fermes.SAU') }}" />
                    <x-form.text-area col="col-12 col-sm-12" name="observation"
                        label="{{ trans('pages/fermes.observation') }}" />

                </x-form.card>

                <x-form.card col="col-12 row" title="{{ trans('pages/fermes.contact') }}">

                    <x-form.input col="col-12 col-sm-3" name="fixe" label="{{ trans('pages/fermes.fixe') }}" />
                    <x-form.input col="col-12 col-sm-3" name="fax" label="{{ trans('pages/fermes.fax') }}" />
                    <x-form.input col="col-12 col-sm-3" name="GSM1" label="{{ trans('pages/fermes.GSM1') }}" />
                    <x-form.input col="col-12 col-sm-3" name="GSM2" label="{{ trans('pages/fermes.GSM2') }}" />
                    <x-form.input col="col-12 col-sm-6" name="email" label="{{ trans('pages/fermes.email') }}" />
                    <x-form.input col="col-12 col-sm-6" name="siteWeb" label="{{ trans('pages/fermes.siteWeb') }}" />

                </x-form.card>

                <x-form.card col="col-12 row" title="{{ trans('pages/fermes.adresse') }}">

                    <x-form.input col="col-12 col-sm-6" name="Douar" label="{{ trans('pages/fermes.Douar') }}" />
                    <x-form.input col="col-12 col-sm-6" name="Cercle" label="{{ trans('pages/fermes.Cercle') }}" />
                    <x-form.input col="col-12 col-sm-6" name="province" label="{{ trans('pages/fermes.province') }}" />
                    <x-form.input col="col-12 col-sm-6" name="region" label="{{ trans('pages/fermes.region') }}" />
                    <x-form.text-area col="col-12 col-sm-12" name="adresse" label="{{ trans('pages/fermes.adresse') }}" />
                    <x-form.input col="col-12 col-sm-6" name="gps" label="{{ trans('pages/fermes.gps') }}" />
                    <x-form.input col="col-12 col-sm-6" name="ville" label="{{ trans('pages/fermes.ville') }}" />

                    <div class="col-12 mt-5">
                        <x-form.button />
                    </div>

                </x-form.card>

        </x-form.form>
    @endBinding

    <x-form.card col="col-12 row" title="Historique">

        <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#kt_parcelles_tab">Parcelle</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#kt_typesols_tab">Type de sol</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="kt_parcelles_tab" role="tabpanel">

                @bind($model->parcelles)
                <x-table.data-table
                    :actions="$actions"
                    :heads="$heads"
                    :more-route="[
                        [
                            'name' => 'Modifier',
                            'route' => 'parcelles.show',
                            'paras' => [
                                \App\Models\Parcelle::PK,
                                ['back' => url() -> current()],
                            ]
                        ],

                        [
                            'name' => 'Supprime',
                            'route' => 'parcelles.delete',
                            'paras' => [\App\Models\Parcelle::PK]
                        ]
                    ]"
                    />
                @endBinding
            </div>

            <div class="tab-pane fade show" id="kt_typesols_tab" role="tabpanel">
                @bind($typesols)
                <x-table.data-table
                    :actions="$actions2"
                    :heads="$heads2"
                    :more-route="[
                        [
                            'name' => 'Modifier',
                            'route' => 'typesols.show',
                            'paras' => [
                                \App\Models\Typesol::PK,
                                ['back' => url()->current()],
                            ],
                        ],
                        [
                            'name' => 'Supprime',
                            'route' => 'typesols.delete',
                            'paras' => [\App\Models\Typesol::PK,],
                        ],
                    ]"
                />
                @endBinding
            </div>

        </div>

    </x-form.card> 

@endsection

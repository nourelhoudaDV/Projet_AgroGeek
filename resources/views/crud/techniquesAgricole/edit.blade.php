@extends('layout.master')
@include('include.blade-components')

@section('page_title', trans('pages/fermes.edit_page_title'))
@section('breadcrumb')
    <x-group.bread-crumb page-tittle="{{ '' }}" :indexes="[
        ['name' => "", 'route' => route('techniquesAgricole.index')],
        ['name' => '', 'current' => true],
    ]" />
@endsection


@section('content')

    @bind($model)
        <x-form.form method="post" action="{{ route('techniquesAgricole.update', $model[$model::PK]) }}">

                <x-form.card col="col-12 row" title="{{ 'card title' }}">
                    <x-form.input col="col-12 col-sm-6" name="nom" label="{{ 'nom' }}" />
                    <x-form.text-area col="col-12 col-sm-6" name="fullNameG" label="{{ 'description' }}" />
                </x-form.card>

                    <div class="col-12 mt-5">
                        <x-form.button />
                    </div>
        </x-form.form>
    @endBinding

    <x-form.card col="col-12 row" title="Historique">

        <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#kt_parcelles_tab">modes_techniques</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#kt_typesols_tab">Type de sol</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="kt_parcelles_tab" role="tabpanel">

                @bind($model->modesTechnique)
                <x-table.data-table
                    :actions="$actions"
                    :heads="$heads"
                    :more-route="[
                        [
                            'name' => 'Modifier',
                            'route' => 'modesTechnique.show',
                            'paras' => [
                                \App\Models\modesTechnique::PK,
                                ['back' => url() -> current()],
                            ]
                        ],

                        [
                            'name' => 'Supprime',
                            'route' => 'modesTechnique.delete',
                            'paras' => [\App\Models\modesTechnique::PK]
                        ]
                    ]"
                    />
                @endBinding
            </div>

            <div class="tab-pane fade show" id="kt_typesMateriel_tab" role="tabpanel">
                @bind($typesMateriel)
                <x-table.data-table
                    :actions="$actions2"
                    :heads="$heads2"
                    :more-route="[
                        [
                            'name' => 'Modifier',
                            'route' => 'typesMateriel.show',
                            'paras' => [
                                \App\Models\typesMateriel::PK,
                                ['back' => url()->current()],
                            ],
                        ],
                        [
                            'name' => 'Supprime',
                            'route' => 'typesMateriel.delete',
                            'paras' => [\App\Models\typesMateriel::PK,],
                        ],
                    ]"
                />
                @endBinding
            </div>

        </div>

    </x-form.card> 

@endsection

@extends('layout.master')
@include('include.blade-components')
@section('page_title' , 'Modifier Variete')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Modifier Variete"
        :indexes="[
        ['name'=> 'Les Varietes' , 'route'=> route('varietes.index')],
        ['name'=> 'Modifier Variete' ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')
    <x-form.form
        method="post"
        action="{{ route('varietes.update' , $model[$model::PK]) }}"
    > 
    <x-form.card col="col-12 row" title="Entree Les Informations De Variete">

        @bind($model)
        <div class="col-12 row">
                <div class="col-10 row">
                    <x-form.select
                    col="col-12 col-sm-6"
                    required
                    name="espece"
                    label="espece"
                    :bind-with="[\App\Models\Espece::allForSelect(), [\App\Models\Espece::PK , 'espece_name']]"
                />
                    <x-form.input   name="nomCommercial" label="nom Commercial" />
                    <x-form.input   name="appelationAr" label="appelation Ar" />
                    <x-form.input   name="quantite" label="quantite" />
                    <x-form.input   name="precocite" label="precocite" />
                    <x-form.input   name="resistance" label="resistance" />
                    <x-form.input   name="competitivite" label="competitivite" />
                    <x-form.text-area col="col-12 col-sm-6" name="description" label="description"/>
                       @endBinding

                    <div class="col-12 mt-5">
                        <x-form.button/>
                    </div>
            </x-form.card>
        </div>
    </x-form.form>

    <x-form.card col="col-12 row pt-5" title="Historique">
        <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#kt_stades_tab">Stade Varietes</a>
            </li>

        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="kt_stades_tab" role="tabpanel">


                    @bind( $model->stadevarietes )
                    <x-table.data-table
                        :actions="$actions"
                        :heads="$heads"

                        :more-routes="[
                           [
                               'name' => 'Modifier',
                               'route' => 'stadevarietes.show',
                               'paras' => [
                                        \App\Models\StadeVariete::PK ,
                                        [
                                            'back' => url()->current()
                                        ]
                               ],

                           ],
                           [
                               'name' => 'Supprime',
                               'route' => 'stadevarietes.delete',
                               'paras' => [\App\Models\StadeVariete::PK ],

                           ]
                      ]"

                    />
                    @endBinding


            </div>

            <div class="tab-pane fade show " id="kt_users_tab" role="tabpanel">

            </div>
        </div>
    </x-form.card>
    
@endsection

@extends('layout.master')
@include('include.blade-components')

@section('page_title' , 'Modifier Espece')

@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Modifier Espece"
        :indexes="[
        ['name'=> 'Les Especes' , 'route'=> route('especes.index')],
        ['name'=> 'Modifier le Espece',     'current' =>true ],
    ]"
    />
@endsection

@section('content')
    <x-form.form
        method="post"
        action="{{ route('especes.update' , $model[$model::PK]) }}"
    >
        <x-form.card col="col-12 row" title="Entree Les Informations D'espece">

            @bind($model)
            <x-form.input required col="col-12 col-sm-6" name="nomSc" label="nom d'espece"/>
            <x-form.input required col="col-12 col-sm-6" name="nomCommercial" label="nom commercial"/>
            <x-form.input col="col-12 col-sm-6" name="appelationAr" label="appelation Ar"/>
            <x-form.select
                col="col-12 col-sm-6"

                name="categorieEspece"
                label="categorie d'espece"
                :options="[
                    'ceriales' =>' Ceriales',
                    'legumineuses' =>' Legumineuses',
                    'arboreculture' =>' Arboreculture',
                    'argrumes' =>' Argrumes',


                ]"
            />
            <x-form.input col="col-12 col-sm-6" name="typeEnracinement" label="type enracinement"/>
            <x-form.text-area col="col-12 col-sm-6" name="description" label="description"/>
            @endBinding

            <div class="col-12 mt-5">
                <x-form.button/>
            </div>
        </x-form.card>

    </x-form.form>

    <x-form.card col="col-12 row pt-5" title="Historique">
        <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#kt_stades_tab">Stades</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-bs-toggle="tab" href="#kt_varietes_tab">Varietes</a>
            </li>

        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="kt_stades_tab" role="tabpanel">


                    @bind( $model->stades )
                    <x-table.data-table
                        :actions="$actions"
                        :heads="$heads"
                        edit-route="stades.show"
                        delete-route="stades.delete"

                    />
                    @endBinding


            </div>

            <div class="tab-pane fade show " id="kt_varietes_tab" role="tabpanel">

                @bind( $model2->varietes )
                <x-table.data-table
                    :actions="$actions2"
                    :heads="$heads2"
                    edit-route="varietes.show"
                    delete-route="varietes.delete"
                />
                @endBinding

            </div>
        </div>
    </x-form.card>


@endsection

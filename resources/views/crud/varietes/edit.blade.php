@extends('layout.master')
@include('include.blade-components')
@section('page_title' , 'Modifier Variete')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Modifier Variete"
        :indexes="[
                ['name'=> 'retour' , 'route'=> route('especes.show',$model['espece'])],
                ['name'=> 'Modifier Variete' ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')
    <x-form.form
        method="post"
        action="{{ route('varietes.update' , $model[$model::PK]) }}"
        >
        @bind($model)
            <x-form.card col=" row" title="Entree Les Informations De Variete">

            
                <x-form.input required name="nomCommercial" col="col-12 col-md-6"  label="nom Commercial"/>
                <x-form.input required name="appelationAr" col="col-12 col-md-6" label="appelation Ar"/>
                <x-form.input required col="col-12 col-md-6" name="quantite" label="quantite"/>
                <x-form.input required col="col-12 col-md-6" name="precocite" label="precocite"/>
                <x-form.input required col="col-12 col-md-6" name="resistance" label="resistance"/>
                <x-form.input required col="col-12 col-md-6" name="competitivite" label="competitivite"/>
                
                <x-form.text-area  name="description" label="description"/>
                
                <div class="col-12 mt-5">
                    <x-form.button/>
                </div>
            </x-form.card>

        @endBinding
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
                        edit-route="stadeVarietes.show"
                        delete-route="stadeVarietes.delete"

                    />
                    @endBinding


            </div>

        </div>
    </x-form.card>

@endsection

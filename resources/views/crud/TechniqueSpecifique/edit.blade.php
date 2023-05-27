@extends('layout.master')
@include('include.blade-components')
@section('page_title' , 'Modifier TechniqueSpecifique')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Modifier TechniqueSpecifique"
        :indexes="[
        ['name'=> 'retour' , 'route'=> route('TechniquesAgricole.show',$model['idTechFK'])],
        ['name'=> 'Modifier le TechniqueSpecifique' ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')
    <x-form.form
        method="post"
        action="{{ route('TechniqueSpecifique.update' , $model[$model::PK]) }}"
        >
        @bind($model)
        <x-form.card col="col-12 row" title="Entre les informations des TechniqueSpecifique">
            
            <x-form.file col="col-md-2" name="logo" label="logo" />

            <div class="col-md-10 row">
             
            <x-form.input  name="titre"  label="titre"/>
           
            <x-form.text-area  name="description" label="description"/>
            </div>
            <div class="col-12 mt-5">
                <x-form.button/>
            </div>
        </x-form.card>

        @endBinding
    </x-form.form>

    <x-form.card col="col-12 row pt-5" title="Historique">
        <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#kt_stades_tab">charge technique specifique</a>
            </li>

        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="kt_stades_tab" role="tabpanel">

                    @bind( $collection  )
                    <x-table.data-table
                        :actions="$actions"
                        :heads="$heads"
                        edit-route="ChargesTechSpe.show"
                        delete-route="ChargesTechSpe.delete"

                    />
                    @endBinding


            </div>

        </div>
    </x-form.card>

@endsection

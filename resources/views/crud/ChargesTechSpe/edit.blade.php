@extends('layout.master')
@include('include.blade-components')
@section('page_title' , 'Modifier ChargesTechSpe')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Modifier ChargesTechSpe"
        :indexes="[
            ['name'=> 'retour' , 'route'=> route('TechniqueSpecifique.show',$model['idTechFK'])],
            ['name'=> 'Ajoute ModesTechnique' ,     'current' =>true ],
        ]"
    />
@endsection
@section('content')
    <x-form.form
        method="post"
        action="{{ route('ChargesTechSpe.update' , $model[$model::PK]) }}"
        >
        @bind($model)
        <x-form.card col="col-12 row" title="Entre les informations des TechniqueSpecifique">
            
            <x-form.input  name="titre"    col='col-12 col-md-8' label="titre"/>
            <x-form.input  name="costUnit" col='col-12 col-md-4'  label="costUnit"/>
           
            <x-form.text-area  name="description" label="description"/>
            <div class="col-12 mt-5">
                <x-form.button/>
            </div>
        </x-form.card>

        @endBinding
    </x-form.form>


@endsection

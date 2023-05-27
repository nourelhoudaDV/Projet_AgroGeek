@extends('layout.master')
@include('include.blade-components')
@section('page_title' , 'Ajouter ChargesTechSpe')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Ajouter ChargesTechSpe"
        :indexes="[
        ['name'=> 'retour' , 'route'=> route('TechniqueSpecifique.show',$especeId)],
        ['name'=> 'Ajouter Charge Technique specifique' ,     'current' =>true ],
    ]"
    />
@endsection


@section('content')

    <x-form.form
        method="post"
        action="{{ route('ChargesTechSpe.store') }}"
    >
        <x-form.card col="col-12 row" title="Entre les informations des ChargesTechSpe">
       
             
            <x-form.input  name="titre"    col='col-12 col-md-8' label="titre"/>
            <x-form.input  name="costUnit" col='col-12 col-md-4'  label="costUnit"/>
           
            <x-form.text-area  name="description" label="description"/>
            <input type="hidden" name="idTechFK" value="{{$especeId }}">
        
            <div class="col-12 mt-5">
                <x-form.button/>
            </div>
        </x-form.card>

    </x-form.form>
@endsection

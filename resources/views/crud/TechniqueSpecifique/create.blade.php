@extends('layout.master')
@include('include.blade-components')
@section('page_title' , 'Ajoute TechniqueSpecifique')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Ajoute TechniqueSpecifique"
        :indexes="[
            ['name'=> 'retour' , 'route'=> route('TechniquesAgricole.show',$especeId)],
            ['name'=> 'Ajoute technique specifique' ,     'current' =>true ],
        ]"
    />
@endsection


@section('content')

    <x-form.form
        method="post"
        action="{{ route('TechniqueSpecifique.store') }}"
    >
        <x-form.card col="col-12 row" title="Entre les informations des TechniqueSpecifique">
            
            <x-form.file col="col-md-2" name="logo" label="logo" />

            <div class="col-md-10 row">
             
            <x-form.input  name="titre"  label="titre"/>
           
            <x-form.text-area  name="description" label="description"/>
            <input type="hidden" name="idTechFK" value="{{$especeId }}">
            </div>
            <div class="col-12 mt-5">
                <x-form.button/>
            </div>
        </x-form.card>

    </x-form.form>
@endsection

@extends('layout.master')
@include('include.blade-components')
@section('page_title' , 'Modifier Qualification')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Modifier Qualification"
        :indexes="[
        ['name'=> 'retour' , 'route'=> route('TechniquesAgricole.show',$model['idTechFK'])],
        ['name'=> 'modifier le qualifications' ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')
    <x-form.form
        method="post"
        action="{{ route('qualifications.update', $model[$model::PK]) }}"
    >
        <x-form.card col="col-12 row" title="Entree Les Informations De Qualification">
            @bind($model)
            <div class="col-2">
                <x-form.file name="logo" required label="logo"/>
            </div>
            <div class="col-10">
                <x-form.input col="col-6" required name="titre" label="titre" />
                <x-form.input col="col-6" name="unite" label="unite" />
                <x-form.text-area col="col-12" name="description" label="description" />
            </div>
          
            @endBinding
            <div class="col-12 mt-5">
                <x-form.button/>
            </div>
        </x-form.card>

    </x-form.form>

@endsection

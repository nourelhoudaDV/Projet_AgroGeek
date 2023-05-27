@extends('layout.master')
@include('include.blade-components')
@section('page_title' , 'Modifier Type de Matériel')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Modifier Type de Matériel"
      
    />
@endsection
@section('content')
    <x-form.form
        method="post"
        action="{{ route('typeMateriel.update' , $model[$model::PK]) }}"
    >
        <x-form.card col="col-12 row" title="Entree Les Informations De Type de Matériel">
            @bind($model)
            <div class="col-2">
                <x-form.file name="logo" required label="logo"/>
            </div>
            <div class="col-10">
                <x-form.input col="col-12" required name="titre" label="titre" />
                <x-form.text-area col="col-12" name="description" label="description" />
            </div>
            <div class="col-12 mt-5">
                <x-form.button/>
            </div>
        </x-form.card>
    </x-form.form>
@endsection

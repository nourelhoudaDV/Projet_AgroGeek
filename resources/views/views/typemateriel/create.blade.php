@extends('layout.master')
@include('include.blade-components')
@section('page_title' , 'Ajouter un type de matériel')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Ajouter un type de matériel"

    />
@endsection
@section('content')
    <x-form.form
        method="post"
        action="{{ route('typeMateriel.store') }}"
    >
        <x-form.card col="col-12 row" title="Entrez les informations du type de matériel">

            <div class="col-2">
                <input type="hidden" value="{{ $idta }}" name="idTA"/>
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

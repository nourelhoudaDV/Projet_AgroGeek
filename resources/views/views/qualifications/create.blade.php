@extends('layout.master')
@include('include.blade-components')
@section('page_title' , 'Ajouter une qualification')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Ajouter une qualification"
    />
@endsection
@section('content')
    <x-form.form
        method="post"
        action="{{ route('qualifications.store') }}"
    >
        <x-form.card col="col-12 row" title="Entrez les informations de qualification">
            <div class="col-2">
                <input type="hidden" value="{{ $idta }}" name="idTA"/>
                <x-form.file name="logo" required label="logo"/>
            </div>
            <div class="col-10">
                <x-form.input col="col-6" required name="titre" label="titre" />
                <x-form.input col="col-6" name="unite" label="unite" />
                <x-form.text-area col="col-12" name="description" label="description" />
            </div>
            <div class="col-12 mt-5">
                <x-form.button/>
            </div>
        </x-form.card>

    </x-form.form>

@endsection

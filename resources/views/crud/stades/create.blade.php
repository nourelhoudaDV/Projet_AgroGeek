@extends('layout.master')
@include('include.blade-components')
@section('page_title' , 'Ajoute Stade')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Ajoute Stade"
        :indexes="$pagesIndexes"
    />
@endsection
@section('content')
    <x-form.form
        method="post"
        action="{{ route('stades.store') }}"
    >
        <x-form.card col="col-12 row" title="Entree Les Informations De Stade">
            <input type="hidden" name="espece" value="{{$especeId }}">

            <x-form.input required col="col-12 col-sm-6" name="nom" label="nom"/>
            <x-form.input required col="col-12 col-sm-6" name="phaseFin" label="phaseFin"/>
        
            <x-form.text-area col="col-12 col-sm-12" name="description" label="description"/>
            <div class="col-12 mt-5">
                <x-form.button/>
            </div>
        </x-form.card>

    </x-form.form>

@endsection


@extends('layout.master')
@include('include.blade-components')
@section('page_title' , 'Ajouter une qualification')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Ajouter une qualification"
        :indexes="$pagesIndexes"
    />
@endsection
@section('content')
    <x-form.form
        method="post"
        action="{{ route('qualifications.store') }}"
    >
        <x-form.card col="col-12 row" title="Entrez les informations de qualification">

            <x-form.input required col="col-12 col-sm-6" name="nom" label="Nom"/>
            <x-form.select
                col="col-12 col-sm-6"
                required
                name="techniqueA_id"
                label="Technique Agricole"
                :bind-with="[\App\Models\TechniqueAgricole::allForSelect(), [\App\Models\TechniqueAgricole::PK , 'nom']]"
            />
            <x-form.text-area col="col-12 col-sm-12" name="description" label="Description"/>
            <div class="col-12 mt-5">
                <x-form.button/>
            </div>
        </x-form.card>

    </x-form.form>

@endsection

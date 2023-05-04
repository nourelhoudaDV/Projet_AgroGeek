@extends('layout.master')
@include('include.blade-components')
@section('page_title' , 'Ajouter un type de matériel')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Ajouter un type de matériel"
        :indexes="$pagesIndexes"
    />
@endsection
@section('content')
    <x-form.form
        method="post"
        action="{{ route('typemateriel.store') }}"
    >
        <x-form.card col="col-12 row" title="Entrez les informations du type de matériel">

            <x-form.input required col="col-12 col-sm-6" name="nomTM" label="Nom"/>
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

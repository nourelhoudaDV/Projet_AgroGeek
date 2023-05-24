@extends('layout.master')
@include('include.blade-components')
@section('page_title' , 'Modifier Qualification')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Modifier Qualification"
        :indexes="$pagesIndexes"
    />
@endsection
@section('content')
    <x-form.form
        method="post"
        action="{{ route('qualifications.update', $model[$model::PK]) }}"
    >
        <x-form.card col="col-12 row" title="Entree Les Informations De Qualification">
            @bind($model)
            <x-form.input required col="col-12 col-sm-6" name="nom" label="Nom"/>
            <x-form.text-area col="col-12 col-sm-6" name="description" label="Description"/>
            <x-form.select
                col="col-12 col-sm-6"
                required
                name="techniqueA_id"
                label="Technique Agricole"
                :bind-with="[\App\Models\TechniqueAgricole::allForSelect(), [\App\Models\TechniqueAgricole::PK , 'nom']]"
            />
            @endBinding
            <div class="col-12 mt-5">
                <x-form.button/>
            </div>
        </x-form.card>

    </x-form.form>

@endsection

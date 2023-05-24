@extends('layout.master')
@include('include.blade-components')
@section('page_title' , 'Modifier Type de Matériel')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Modifier Type de Matériel"
        :indexes="$pagesIndexes"
    />
@endsection
@section('content')
    <x-form.form
        method="post"
        action="{{ route('typesMateriel.update' , $model[$model::PK]) }}"
    >
        <x-form.card col="col-12 row" title="Entree Les Informations De Type de Matériel">
            @bind($model)
            <x-form.input required col="col-12 col-sm-6" name="nom" label="nom"/>
            <x-form.select
                col="col-12 col-sm-6"
                required
                name="techniqueA_id"
                label="Technique Agricole"
                :bind-with="[\App\Models\TechniqueAgricole::allForSelect(), [\App\Models\TechniqueAgricole::PK , 'nom']]"
            />
            <x-form.text-area col="col-12" name="description" label="description"/>
            @endBinding
            <div class="col-12 mt-5">
                <x-form.button/>
            </div>
        </x-form.card>
    </x-form.form>
@endsection

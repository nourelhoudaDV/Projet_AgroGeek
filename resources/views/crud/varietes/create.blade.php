@extends('layout.master')
@include('include.blade-components')
@section('page_title' , 'Ajoute Variete')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Ajoute Variete"
        :indexes="[
        ['name'=> 'Les Varietes' , 'route'=> route('varietes.index')],
        ['name'=> 'Ajoute Variete' ,     'current' =>true ],
    ]"
    />
@endsection


@section('content')

    <x-form.form
        method="post"
        action="{{ route('varietes.store') }}"
    >
        <x-form.card col="col-12 row" title="Entre les informations des Varietes">

            <div class="col-10 row">
                <x-form.select
                col="col-12 col-sm-6"
                required
                name="espece"
                label="espece"
                :bind-with="[\App\Models\Espece::allForSelect(), [\App\Models\Espece::PK , 'espece_name']]"
            />
                <x-form.input name="nomCommercial" label="nom Commercial"/>
                <x-form.input name="appelationAr" label="appelation Ar"/>
                <x-form.text-area col="col-12 col-sm-6" name="description" label="description"/>
                <x-form.input col="col-12 col-sm-6" name="quantite" label="quantite"/>
                <x-form.input col="col-12 col-sm-6" name="precocite" label="precocite"/>
                <x-form.input col="col-12 col-sm-6" name="resistance" label="resistance"/>
                <x-form.input col="col-12 col-sm-6" name="competitivite" label="competitivite"/>

                <div class="col-12 mt-5">
                    <x-form.button/>
                </div>
        </x-form.card>

    </x-form.form>
@endsection

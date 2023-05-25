@extends('layout.master')
@include('include.blade-components')

@section('page_title' , 'Modifier le Type Sol')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Modifier le Type Sol"
        :indexes="[
        ['name'=> 'fermes' , 'route'=> route('fermes.index')],
        ['name'=> 'Modifier le Type Sol' ,     'current' =>true ],
    ]"
    />
@endsection

@section('content')

    @bind($model)

    <x-form.form
        method="post"
        action="{{ route('typesols.update' , $model[$model::PK]) }}"
    >
    
    <x-form.card col="col-12 row" title="{{ ucwords('id Type sol Ferme') }}">
           
        
        <x-form.input col="col-12 col-sm-6" name="vernaculaure" label="{{ 'vernaculaure' }}" />
        <x-form.input col="col-12 col-sm-6" name="nomDomaine" label="{{ 'nom de ferme' }}" />

    </x-form.card>

    <x-form.card col="col-12 row" title="{{ ucwords('Analyses Physico Chimique') }}">

        <x-form.input col="col-12 col-sm-3" name="teneurArgile" label="{{ 'teneur Argile' }}" />
        <x-form.input col="col-12 col-sm-3" name="teneurLimon" label="{{ 'teneur Limon' }}" />
        <x-form.input col="col-12 col-sm-3" name="teneurSable" label="{{ 'teneur Sable' }}" />
        <x-form.input col="col-12 col-sm-3" name="teneurPhosphore" label="{{ 'teneur Phosphore' }}" />
        <x-form.input col="col-12 col-sm-3" name="teneurPotassiume" label="{{ 'teneur Potasiume' }}" />
        <x-form.input col="col-12 col-sm-3" name="teneurAzote" label="{{ 'teneur Azote' }}" />
        <x-form.input col="col-12 col-sm-3" name="calcaireActif" label="{{ 'calcaire Actif' }}" />
        <x-form.input col="col-12 col-sm-3" name="calcaireTotal" label="{{ 'calcaire Total' }}" />
        <x-form.input col="col-12 col-sm-3" name="conductiviteElectrique" label="{{ 'conductivite Electrique' }}" />

    </x-form.card>

    <x-form.card col="col-12 row" title="{{ ucwords('Caractéristiques Hydroliques') }}">

        <x-form.input col="col-12 col-sm-3" name="HCC" label="{{ 'Humidité à la capacité au champ'}}" />
        <x-form.input col="col-12 col-sm-3" name="HPF" label="{{ 'Humidité Point de Filtration' }}" />
        <x-form.input col="col-12 col-sm-3" name="DA" label="{{ 'densité Apparente' }}" />

        <div class="col-12 mt-5">
            <x-form.button />
        </div>

    </x-form.card>

    </x-form.form>

    @endBinding

@endsection

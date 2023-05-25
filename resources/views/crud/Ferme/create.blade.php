@extends('layout.master')
@include('include.blade-components')

@section('page_title', 'Ajouter Nouveau Ferme')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Ajouter Nouveau Ferme"
        :indexes="[
        ['name' => 'liste de Fermes', 'route' => route('fermes.index')],
        ['name' => 'Ajouter Nouveau Ferme', 'current' => true],
    ]" />
@endsection


@section('content')

    <x-form.form
        method="post"
        action="{{ route('fermes.store') }}"
    >
    
        <x-form.card col="col-12 row" title="identifiant Ferme">

            <x-form.file col="col-md-2" name="logo" label="logo" />

            <div class="col-md-10 row">
                
                <x-form.input required  name="nomDomaine" label="Nom de Ferme" />
                <x-form.input required col="col-12 col-md-4" name="fullNameG" label="Nom Gerant" />
                <x-form.input required col="col-12 col-md-4" name="cin" label="CIN" />
                <x-form.input col="col-12 col-md-4" name="contactG" label="Contact Gerant" />
                <x-form.input col="col-12 col-md-6" name="SAT" label="Superficie Agricole Totale" />
                <x-form.input col="col-12 col-md-6" name="SAU" label="Superficie Agricole Utile" />
                <x-form.text-area col="col-12 col-md-12" name="observation" label="Observation" />
            </div>

        </x-form.card>

        <x-form.card col="col-12 row" title="Contact">

            <x-form.input col="col-12 col-md-3" name="fixe" label="fix" />
            <x-form.input col="col-12 col-md-3" name="fax" label="fax" />
            <x-form.input col="col-12 col-md-3" name="GSM1" label="GSM1" />
            <x-form.input col="col-12 col-md-3" name="GSM2" label="GSM2" />
            <x-form.input col="col-12 col-md-6" name="email" label="email" />
            <x-form.input col="col-12 col-md-6" name="siteWeb" label="siteWeb" />

        </x-form.card>

        <x-form.card col="col-12 row" title="Adresse">

            <x-form.input col="col-12 col-md-6" name="Douar" label="Douar" />
            <x-form.input col="col-12 col-md-6" name="Cercle" label="Cercle" />
            <x-form.input col="col-12 col-md-6" name="province" label="province" />
            <x-form.input col="col-12 col-md-6" name="region" label="region" />
            <x-form.text-area col="col-12 col-md-12" name="adresse" label="adresse" />
            <x-form.input col="col-12 col-md-6" name="gps" label="gps" />
            <x-form.input col="col-12 col-md-6" name="ville" label="ville" />

            <div class="col-12 mt-5">
                <x-form.button />
            </div>

        </x-form.card>
    </x-form.form>

@endsection


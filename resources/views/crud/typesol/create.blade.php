@extends('layout.master')
@include('include.blade-components')
@section('page_title', 'Ajouter Nouveau Type Sol'))
@section('breadcrumb')
    <x-group.bread-crumb page-tittle="Ajouter Nouveau Type Sol" :indexes="[
        ['name' => 'fermes', 'route' => route('fermes.index')],
        ['name' => 'Ajouter Nouveau Type Sol', 'current' => true],
    ]" />
@endsection

@section('content')

    <x-form.form method="post" action="{{ route('typesols.store') }}">

        <x-form.card col="col-12 row" title="{{ ucwords('id Type sol Ferme') }}">
           
            <input type="hidden" name="ferme" value="{{$fermeId }}">
            <x-form.input col="col-12 col-md-6" name="vernaculaure" label="{{ 'nom vernaculaure' }}" />
            <x-form.input col="col-12 col-md-6" name="nomDomaine" label="{{ 'nom pédologique' }}" />

        </x-form.card>

        <x-form.card col="col-12 row" title="{{ ucwords('Analyses Physico Chimique') }}">

            <x-form.input col="col-12 col-md-4" name="teneurArgile" label="{{ 'teneur Argile' }}" />
            <x-form.input col="col-12 col-md-4" name="teneurLimon" label="{{ 'teneur Limon' }}" />
            <x-form.input col="col-12 col-md-4" name="teneurSable" label="{{ 'teneur Sable' }}" />
            <x-form.input col="col-12 col-md-4" name="teneurPhosphore" label="{{ 'teneur Phosphore' }}" />
            <x-form.input col="col-12 col-md-4" name="teneurPotasiume" label="{{ 'teneur Potasiume' }}" />
            <x-form.input col="col-12 col-md-4" name="teneurAzote" label="{{ 'teneur Azote' }}" />
            <x-form.input col="col-12 col-md-4" name="calcaireActif" label="{{ 'calcaire Actif' }}" />
            <x-form.input col="col-12 col-md-4" name="calcaireTotal" label="{{ 'calcaire Total' }}" />
            <x-form.input col="col-12 col-md-4" name="conductiviteElectrique" label="{{ 'conductivite Electrique' }}" />

        </x-form.card>

        <x-form.card col="col-12 row" title="{{ ucwords('Caractéristiques Hydroliques') }}">

            <x-form.input col="col-12 col-md-4" name="HCC" label="{{ 'Humidité à la capacité au champ'}}" />
            <x-form.input col="col-12 col-md-4" name="HPF" label="{{ 'Humidité Point de Filtration' }}" />
            <x-form.input col="col-12 col-md-4" name="DA" label="{{ 'densité Apparente' }}" />

            <div class="col-12 mt-5">
                <x-form.button />
            </div>

        </x-form.card>

    </x-form.form>

@endsection


{{-- @push('scripts')
    <script src="{{ asset('assets/js/custom/crud/users/create.js') }}"></script>
@endpush --}}

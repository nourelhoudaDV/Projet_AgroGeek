@extends('layout.master')
@include('include.blade-components')

@section('page_title', 'Ajouter noveau Stade variete')
@section('breadcrumb')
    <x-group.bread-crumb page-tittle='Ajouter noveau Stade variete' :indexes="[
        ['name' => 'Stadevariete', 'route' => route('stadeVarietes.index')],
        ['name' => 'pages/parcelles.Ajouter noveau Stade variete', 'current' => true],
    ]" />
@endsection


@section('content')

    <x-form.form method="post" action="{{ route('stadeVarietes.store') }}">
            <x-form.card col="col-12 row" title='pages/parcelle.identification_stade_Variete'>
                <x-form.input col="col-12 col-sm-6" name="nom" label="{{ trans('words.nom') }}" />
                <x-form.input col="col-12 col-sm-6" name="phaseFin" label="{{ trans('words.phaseFin') }}" />
                <x-form.select col="col-12 col-sm-6" name="espece" label="espece" :bind-with="[\App\Models\Espece::all(), ['ide', 'espece']]"/>
                <x-form.select col="col-12 col-sm-6" name="variete" label="variete" :bind-with="[\App\Models\Variete::all(), ['idV', 'variete']]"/>
                <x-form.input col="col-12 col-sm-4" name="sommesTemps" label="sommesTemps"/>
                <x-form.input col="col-12 col-sm-4" name="sommesTempFroid" label="sommesTempFroid"/>
                <x-form.input col="col-12 col-sm-4" name="Kc" label="Kc"/>
                <x-form.input col="col-12 col-sm-3" name="enracinement" label="enracinement"/>
                <x-form.radios col="col-12 col-sm-3" name="maxEnracinement" label="{{ trans('words.maxEnracinement') }}"
                    :radios="[
                        [
                            'value' => 'Y',
                            'label' => 'Oui',
                        ],
                        [
                            'value' => 'N',
                            'label' => 'Non',
                        ],
                    ]" />
                <x-form.text-area col="col-12 col-sm-6" name="description" label="description" />

                <div class="col-12 mt-5">
                    <x-form.button />
                </div>
            </x-form.card>
    </x-form.form>
@endsection


{{-- @push('scripts')
    <script src="{{ asset('assets/js/custom/crud/users/create.js') }}"></script>
@endpush --}}

@extends('layout.master')
@include('include.blade-components')

@section('page_title' ,'Ajouter noveau parcelle')
@section('breadcrumb')
    <x-group.bread-crumb

        page-tittle= 'Ajouter noveau parcelle'
        :indexes="[
        ['name'=> 'Parcelle' , 'route'=> route('parcelles.index')],
        ['name'=> 'pages/parcelles.Ajouter noveau parcelle' ,     'current' =>true ],
    ]"
    />
@endsection


@section('content')

    <x-form.form
        method="post"
        action="{{ route('parcelles.store') }}"
    >
        <x-form.card col="col-12 row" title='pages/parcelle.edit_form_title'>

            <div class="col-10 row">
                <x-form.input col="col-12 col-sm-6" name="codification" label="{{ trans('words.codification') }}"/>
                <x-form.select col="col-12 col-sm-6" name="Ferme" label="Ferme"
                    :bind-with="[
                        \App\Models\Ferme::all(),
                        [
                            'idF' ,  'Ferme'
                        ]
                    ]"
                />
                <x-form.input col="col-12 col-sm-6" name="superficie" label="superficie"/>
                <x-form.radios

                name="modeCulture"
                label="{{ trans('words.modeCulture') }}"
                :radios="[
                    [
                        'value' => 'S',
                        'label' => 'Simple',
                    ],
                     [
                        'value' => 'M',
                        'label' => 'Mixte',
                    ],
                    [
                        'value' => 'E',
                        'label' => 'Etagère',
                    ],
            ]"

            />
                <x-form.text-area col="col-12 col-sm-6" name="topographie" label="topographie"/>
                <x-form.input col="col-12 col-sm-6" name="pente" label="pente"/>
                <x-form.input col="col-12 col-sm-6" name="pierosite" label="pierosite"/>
                <x-form.input col="col-12 col-sm-6" name="gps" label="gps"/>
                <x-form.text-area col="col-12 col-sm-6" name="description" label="description"/>
                <x-form.select col="col-12 col-sm-6" name="typeSol" label="typeSol"
                    :bind-with="[
                        \App\Models\TypeSol::all(),
                        [
                            'idTS' ,  'typeSol'
                        ]
                    ]"
                />

                <div class="col-12 mt-5">
                    <x-form.button/>
                </div>
        </x-form.card>

    </x-form.form>
@endsection


{{-- @push('scripts')
    <script src="{{ asset('assets/js/custom/crud/users/create.js') }}"></script>
@endpush --}}

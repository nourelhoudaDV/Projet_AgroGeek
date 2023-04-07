@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/parcelle.update_user'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/parcelle.edit_page_title') }}"
        :indexes="[
        ['name'=> trans('words.ferme') , 'route'=> route('parcelles.index')],
        ['name'=> trans('pages/parcelle.update_user') ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')
    @bind($model)

    <x-form.form
        method="post"
        action="{{ route('parcelles.update' , $model[$model::PK]) }}"
    >
        <div class="col-12 row">
            <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/parcelles.edit_form_title')) }}">


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
        </div>
    </x-form.form>
    @endBinding
@endsection

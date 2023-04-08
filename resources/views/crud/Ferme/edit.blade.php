@extends('layout.master')
@include('include.blade-components')
@section('page_title', trans('pages/ferme.update_ferme'))
@section('breadcrumb')
    <x-group.bread-crumb page-tittle="{{ trans('pages/ferme.edit_page_title') }}" :indexes="[
        ['name' => trans('words.ferme'), 'route' => route('fermes.index')],
        ['name' => trans('pages/ferme.update_ferme'), 'current' => true],
    ]" />
@endsection
@section('content')
    @bind($model)
        <x-form.form method="post" action="{{ route('fermes.update', $model[$model::PK]) }}">
                <x-form.card col="col-12 row" title='pages/id ferme'>

                    <div class="col-12">
                        <x-form.file col="col-12 col-sm-12" name="logo" label="{{ trans('words.avatar') }}" />
                    </div>
                    <div class="col-10 row">
                        <x-form.input col="col-12 col-sm-6" name="nomDomaine" label="{{ trans('words.nomDomaine') }}" />
                        <x-form.input col="col-12 col-sm-6" name="fullNameG" label="{{ trans('words.fullNameG') }}" />
                        <x-form.input col="col-12 col-sm-3" name="cin" label="cin" />
                        <x-form.input col="col-12 col-sm-3" name="contactG" label="contactG" />
                        <x-form.input col="col-12 col-sm-3" name="SAT" label="SAT" />
                        <x-form.input col="col-12 col-sm-3" name="SAU" label="SAU" />
                        <x-form.text-area col="col-12 col-sm-12" name="observation" label="observation" />
                    </div>
                </x-form.card>
                <x-form.card col="col-12 row" title='pages/contact'>
                    <div class="col-10 row">
                        <x-form.input col="col-12 col-sm-3" name="fixe" label="fixe" />
                        <x-form.input col="col-12 col-sm-3" name="fax" label="fax" />
                        <x-form.input col="col-12 col-sm-3" name="GSM1" label="GSM1" />
                        <x-form.input col="col-12 col-sm-3" name="GSM2" label="GSM2" />
                        <x-form.input col="col-12 col-sm-6" name="email" label="email" />
                        <x-form.input col="col-12 col-sm-6" name="siteWeb" label="siteWeb" />
                    </div>
                </x-form.card>
                <x-form.card col="col-12 row" title='pages/adresse'>
                    <div class="col-10 row">
                        <x-form.input col="col-12 col-sm-6" name="Douar" label="Douar" />
                        <x-form.input col="col-12 col-sm-6" name="Cercle" label="Cercle" />
                        <x-form.input col="col-12 col-sm-6" name="province" label="province" />
                        <x-form.input col="col-12 col-sm-6" name="region" label="region" />
                        <x-form.text-area col="col-12 col-sm-12" name="adresse" label="adresse" />
                        <x-form.input col="col-12 col-sm-6" name="gps" label="gps" />
                        <x-form.input col="col-12 col-sm-6" name="ville" label="ville" />

                        <div class="col-12 mt-5">
                            <x-form.button />
                        </div>
                </x-form.card>
        </x-form.form>
    @endBinding
@endsection

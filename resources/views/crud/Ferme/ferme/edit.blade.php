@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/ferme.update_user'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/ferme.edit_page_title') }}"
        :indexes="[
        ['name'=> trans('words.ferme') , 'route'=> route('fermes.index')],
        ['name'=> trans('pages/ferme.update_user') ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')
    @bind($model)

    <x-form.form
        method="post"
        action="{{ route('fermes.update' , $model[$model::PK]) }}"
    >
        <div class="col-12 row">
            <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/fermes.edit_form_title')) }}">

                <div class="col-2">
                    <x-form.file name="logo" label="{{ trans('words.avatar') }}" />
                </div>
                <div class="col-10 row">
                    <x-form.input required col="col-12 col-sm-6" name="nomDomaine" label="{{ trans('words.name') }}" />
                    <x-form.select col="col-12 col-sm-6" name="fullNameG" label="fullNameG"
                        :bind-with="[
                            \App\Models\Ferme::all(),
                                [
                                    'id' ,  'fullNameG'
                                ]
                            ]"
                    />
                    <x-form.input required col="col-12 col-sm-6" name="cin" label="cin" />
                    <x-form.input required col="col-12 col-sm-6" name="contactG" label="contactG" />
                    <x-form.input col="col-12 col-sm-6" name="SAT" label="SAT" />
                    <x-form.input col="col-12 col-sm-6" name="SAU" label="SAU" />
                    <x-form.text-area col="col-12 col-sm-6" name="observation" label="observation" />
                    <x-form.input col="col-12 col-sm-6" name="fixe" label="fixe" />
                    <x-form.input col="col-12 col-sm-6" name="fax" label="fax" />
                    <x-form.input col="col-12 col-sm-6" name="GSM1" label="GSM1" />
                    <x-form.input col="col-12 col-sm-6" name="GSM2" label="GSM2" />
                    <x-form.input col="col-12 col-sm-6" name="siteWeb" label="siteWeb" />
                    <x-form.input col="col-12 col-sm-6" name="Douar" label="Douar" />
                    <x-form.input col="col-12 col-sm-6" name="Cercle" label="Cercle" />
                    <x-form.input col="col-12 col-sm-6" name="province" label="province" />
                    <x-form.input col="col-12 col-sm-6" name="region" label="region" />
                    <x-form.text-area col="col-12 col-sm-6" name="adresse" label="adresse" />
                    <x-form.input col="col-12 col-sm-6" name="gps" label="gps" />
                    <x-form.input col="col-12 col-sm-6" name="ville" label="ville" />
                
                    <div class="col-12 mt-5">
                        <x-form.button/>
                    </div>
            </x-form.card>
        </div>
    </x-form.form>
    @endBinding
@endsection

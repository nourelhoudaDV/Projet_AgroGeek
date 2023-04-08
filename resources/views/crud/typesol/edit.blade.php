@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/type de sols.update_user'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/type de sols.edit_page_title') }}"
        :indexes="[
        ['name'=> trans('words.type de sol') , 'route'=> route('fermes.index')],
        ['name'=> trans('pages/type de sols.update_user') ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')
    @bind($model)

    <x-form.form
        method="post"
        action="{{ route('typesols.update' , $model[$model::PK]) }}"
    >
        <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/typesols.id_Type_sol_Ferme')) }}">
            <x-form.input col="col-12 col-sm-6" name="vernaculaure" label="{{ trans('words.vernaculaure') }}" />
            <x-form.input col="col-12 col-sm-6" name="nomDomaine" label="{{ trans('words.nomDomaine') }}" />
        </x-form.card>
        <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/typesols.Analyses_Physico-Chimique')) }}">
            <x-form.input col="col-12 col-sm-3" name="teneurArgile" label="{{ trans('words.teneurArgile') }}" />
            <x-form.input col="col-12 col-sm-3" name="teneurLimon" label="{{ trans('words.teneurLimon') }}" />
            <x-form.input col="col-12 col-sm-3" name="teneurSable" label="{{ trans('words.teneurSable') }}" />
            <x-form.input col="col-12 col-sm-3" name="teneurPhosphore" label="{{ trans('words.teneurPhosphore') }}" />
            <x-form.input col="col-12 col-sm-3" name="teneurPotasiume" label="{{ trans('words.teneurPotasiume') }}" />
            <x-form.input col="col-12 col-sm-3" name="teneurAzote" label="{{ trans('words.teneurAzote') }}" />
            <x-form.input col="col-12 col-sm-3" name="calcaireActif" label="{{ trans('words.calcaireActif') }}" />
            <x-form.input col="col-12 col-sm-3" name="calcaireTotal" label="{{ trans('words.calcaireTotal') }}" />
            <x-form.input col="col-12 col-sm-3" name="conductiviteElectrique"
                label="{{ trans('words.conductiviteElectrique') }}" />
        </x-form.card>
        <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/typesols.Caractéristiques_Hydroliques')) }}">
            <x-form.input col="col-12 col-sm-3" name="HCC" label="{{ trans('words.HCC') }}" />
            <x-form.input col="col-12 col-sm-3" name="HPF" label="{{ trans('words.HPF') }}" />
            <x-form.input col="col-12 col-sm-3" name="DA" label="{{ trans('words.DA') }}" />

            <div class="col-12 mt-5">
                <x-form.button />
            </div>
        </x-form.card>
    </x-form.form>
    @endBinding
@endsection

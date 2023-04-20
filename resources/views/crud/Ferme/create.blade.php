@extends('layout.master')
@include('include.blade-components')

@section('page_title', trans('pages/fermes.create_page_title'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/fermes.create_page_title') }}"
        :indexes="[
        ['name' => trans('pages/fermes.index_page_title'), 'route' => route('fermes.index')],
        ['name' => trans('pages/fermes.add_a_new_ferme'), 'current' => true],
    ]" />
@endsection


@section('content')

    <x-form.form
        method="post"
        action="{{ route('fermes.store') }}"
        >

        <x-form.card col="col-12 row" title="{{ trans('pages/fermes.id_ferme')}}">

            <div class="col-12">
                <x-form.file col="col-12 col-sm-12" name="logo" label="{{ trans('pages/fermes.logo') }}" />
            </div>

            <x-form.input col="col-12 col-sm-6" name="nomDomaine" label="{{ trans('pages/fermes.nomDomaine') }}" />
            <x-form.input col="col-12 col-sm-6" name="fullNameG" label="{{ trans('pages/fermes.fullNameG') }}" />
            <x-form.input col="col-12 col-sm-3" name="cin" label="{{ trans('pages/fermes.cin') }}" />
            <x-form.input col="col-12 col-sm-3" name="contactG" label="{{ trans('pages/fermes.contactG') }}" />
            <x-form.input col="col-12 col-sm-3" name="SAT" label="{{ trans('pages/fermes.SAT') }}" />
            <x-form.input col="col-12 col-sm-3" name="SAU" label="{{ trans('pages/fermes.SAU') }}" />
            <x-form.text-area col="col-12 col-sm-12" name="observation" label="{{ trans('pages/fermes.observation') }}" />

        </x-form.card>

        <x-form.card col="col-12 row" title='{{ trans('pages/fermes.contact')}}'>

            <x-form.input col="col-12 col-sm-3" name="fixe" label="{{ trans('pages/fermes.fixe') }}" />
            <x-form.input col="col-12 col-sm-3" name="fax" label="{{ trans('pages/fermes.fax') }}" />
            <x-form.input col="col-12 col-sm-3" name="GSM1" label="{{ trans('pages/fermes.GSM1') }}" />
            <x-form.input col="col-12 col-sm-3" name="GSM2" label="{{ trans('pages/fermes.GSM2') }}" />
            <x-form.input col="col-12 col-sm-6" name="email" label="{{ trans('pages/fermes.email') }}" />
            <x-form.input col="col-12 col-sm-6" name="siteWeb" label="{{ trans('pages/fermes.siteWeb') }}" />

        </x-form.card>

        <x-form.card col="col-12 row" title='{{ trans('pages/fermes.adresse')}}'>

            <x-form.input col="col-12 col-sm-6" name="Douar" label="{{ trans('pages/fermes.Douar') }}" />
            <x-form.input col="col-12 col-sm-6" name="Cercle" label="{{ trans('pages/fermes.Cercle') }}" />
            <x-form.input col="col-12 col-sm-6" name="province" label="{{ trans('pages/fermes.province') }}" />
            <x-form.input col="col-12 col-sm-6" name="region" label="{{ trans('pages/fermes.region') }}" />
            <x-form.text-area col="col-12 col-sm-12" name="adresse" label="{{ trans('pages/fermes.adresse') }}" />
            <x-form.input col="col-12 col-sm-6" name="gps" label="{{ trans('pages/fermes.gps') }}" />
            <x-form.input col="col-12 col-sm-6" name="ville" label="{{ trans('pages/fermes.ville') }}" />

            <div class="col-12 mt-5">
                <x-form.button />
            </div>
            
        </x-form.card>

    </x-form.form>

@endsection


{{-- @push('scripts')
    <script src="{{ asset('assets/js/custom/crud/users/create.js') }}"></script>
@endpush --}}

@extends('layout.master')
@include('include.blade-components')
@section('page_title', trans('pages/type de sols.add_a_new_user'))
@section('breadcrumb')
    <x-group.bread-crumb page-tittle="{{ trans('pages/type de sols.create_page_title') }}" :indexes="[
        ['name' => trans('words.type de sol'), 'route' => route('typesols.index')],
        ['name' => trans('pages/type de sols.add_a_new_user'), 'current' => true],
    ]" />
@endsection


@section('content')

    <x-form.form method="post" action="{{ route('typesols.store') }}">
        <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/type de sols.edit_form_title')) }}">

            <div class="col-10 row">
                <x-form.input name="vernaculaure" label="{{ trans('words.vernaculaure') }}" />
                <x-form.input name="nomDomaine" label="{{ trans('words.nomDomaine') }}" />
                <x-form.input name="teneurArgile" label="{{ trans('words.teneurArgile') }}" />
                <x-form.input name="teneurLimon" label="{{ trans('words.teneurLimon') }}" />
                <x-form.input name="teneurSable" label="{{ trans('words.teneurSable') }}" />
                <x-form.input name="teneurPhosphore" label="{{ trans('words.teneurPhosphore') }}" />
                <x-form.input name="teneurPotasiume" label="{{ trans('words.teneurPotasiume') }}" />
                <x-form.input name="teneurAzote" label="{{ trans('words.teneurAzote') }}" />
                <x-form.input name="calcaireActif" label="{{ trans('words.calcaireActif') }}" />
                <x-form.input name="calcaireTotal" label="{{ trans('words.calcaireTotal') }}" />
                <x-form.input name="conductiviteElectrique" label="{{ trans('words.conductiviteElectrique') }}" />
                <x-form.input name="HCC" label="{{ trans('words.HCC') }}" />
                <x-form.input name="HPF" label="{{ trans('words.HPF') }}" />
                <x-form.input name="DA" label="{{ trans('words.DA') }}" />
            </div>

            <div class="col-12 mt-5">
                <x-form.button />
            </div>
        </x-form.card>

    </x-form.form>
@endsection


{{-- @push('scripts')
    <script src="{{ asset('assets/js/custom/crud/users/create.js') }}"></script>
@endpush --}}

@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/varietes.add_a_new_user'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/varietes.create_page_title') }}"
        :indexes="[
        ['name'=> trans('words.variete') , 'route'=> route('varietes.index')],
        ['name'=> trans('pages/varietes.add_a_new_user') ,     'current' =>true ],
    ]"
    />
@endsection


@section('content')

    <x-form.form
        method="post"
        action="{{ route('varietes.store') }}"
    >
        <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/varietes.edit_form_title')) }}">

            <div class="col-10 row">
                <x-form.select name="especes_id" label="{{ trans('words.especes_id') }}"
                               :bind-with="[
                    \App\Models\EspecesModel::all(),
                    [
                        'id' ,  'nom'
                    ]
                ]"
                />
                <x-form.input name="nomCommercial" label="{{ trans('words.nomCommercial') }}"/>
                <x-form.input name="appelationAr" label="{{ trans('words.appelationAr') }}"/>
                <x-form.text-area col="col-12 col-sm-6" name="description" label="description"/>
                <x-form.input col="col-12 col-sm-6" name="quantite" label="quantite"/>
                <x-form.input col="col-12 col-sm-6" name="precocite" label="precocite"/>
                <x-form.input col="col-12 col-sm-6" name="resistance" label="resistance"/>
                <x-form.input col="col-12 col-sm-6" name="competitivite" label="competitivite"/>

                <div class="col-12 mt-5">
                    <x-form.button/>
                </div>
        </x-form.card>

    </x-form.form>
@endsection


@push('scripts')
    <script src="{{ asset('assets/js/custom/crud/varietes/create.js') }}"></script>
@endpush
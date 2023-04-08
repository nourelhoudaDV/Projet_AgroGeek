@extends('layout.master')
@include('include.blade-components')
@section('page_title' ,'Ajouter noveau produit')
@section('breadcrumb')
    <x-group.bread-crumb

        page-tittle= 'Ajouter noveau produit'
        :indexes="[
        ['name'=> 'especes' , 'route'=> route('especes_models.index')],
        ['name'=> 'pages/especes_models.Ajouter noveau especes' ,     'current' =>true ],
    ]"
    />
@endsection


@section('content')

    <x-form.form
        method="post"
        action="{{ route('especes_models.store') }}"
    >
        <x-form.card col="col-12 row" title='pages/especes_models.edit_form_title'>

            <div class="col-10 row">
                <x-form.input col="col-12 col-sm-6" name="nom" label="{{ trans('words.nom') }}"/>
                <x-form.input col="col-12 col-sm-6" name="categorieEspece" label="{{ trans('words.categorieEspece') }}"/>
                <x-form.input col="col-12 col-sm-6" name="nomCommercial" label="nomCommercial"/>
                <x-form.text-area col="col-12 col-sm-6" name="description" label="description"/>
                <x-form.input col="col-12 col-sm-6" name="typeEnracinement" label="typeEnracinement"/>
                <x-form.input col="col-12 col-sm-6" name="appelationAr" label="appelationAr"/>
                <div class="col-12 mt-5">
                    <x-form.button/>
                </div>
        </x-form.card>

    </x-form.form>
@endsection

{{--
@push('scripts')
    <script src="{{ asset('assets/js/custom/crud/users/create.js') }}"></script>
@endpush --}}

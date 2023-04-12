@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/especes.update_especes'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/especes.edit_page_title') }}"
        :indexes="[
        ['name'=> trans('words.espece') , 'route'=> route('especes.index')],
        ['name'=> trans('pages/especes.update_especes') ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')
    @bind($model)

    <x-form.form
        method="post"
        action="{{ route('especes.update' , $model[$model::PK]) }}"
    >
        <div class="col-12 row">
            <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/especes.identification Especes')) }}">

                <div class="col-10 row">
                    <x-form.input   name="nomSc" label="{{ trans('words.nomSc') }}" />
                    <x-form.input   name="nomCommercial" label="{{ trans('words.nomCommercial') }}" />
                    <x-form.input   name="appelationAr" label="{{ trans('words.appelationAr') }}" />
                    <x-form.input   name="categorieEspece" label="{{ trans('words.categorieEspece') }}" />
                    <x-form.input   name="typeEnracinement" label="{{ trans('words.typeEnracinement') }}" />
                    <x-form.text-area col="col-12 col-sm-6" name="description" label="description"/>





                    <div class="col-12 mt-5">
                        <x-form.button/>
                    </div>
            </x-form.card>
        </div>
    </x-form.form>
    @endBinding
@endsection

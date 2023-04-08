@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/varietes.update_variete'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/varietes.edit_page_title') }}"
        :indexes="[
        ['name'=> trans('words.variete') , 'route'=> route('varietes.index')],
        ['name'=> trans('pages/varietes.update_variete') ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')
    @bind($model)

    <x-form.form
        method="post"
        action="{{ route('varietes.update' , $model[$model::PK]) }}"
    >
        <div class="col-12 row">
            <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/varietes.edit_form_title')) }}">

                <div class="col-10 row">
                    <x-form.input   name="nomCommercial" label="{{ trans('words.nomCommercial') }}" />
                    
                    <x-form.select  name="especes_id" label="{{ trans('words.especes_id') }}"
                                    :bind-with="[
                    \App\Models\EspecesModel::all(),
                    [
                        'id' ,  'nom' 
                    ]
                ]"
                    />
                    <x-form.input   name="appelationAr" label="{{ trans('words.appelationAr') }}" />
                    <x-form.input   name="quantite" label="{{ trans('words.quantite') }}" />
                    <x-form.input   name="precocite" label="{{ trans('words.precocite') }}" />
                    <x-form.input   name="resistance" label="{{ trans('words.resistance') }}" />
                    <x-form.input   name="competitivite" label="{{ trans('words.competitivite') }}" />
                    <x-form.text-area col="col-12 col-sm-6" name="description" label="description"/>


                    <div class="col-12 mt-5">
                        <x-form.button/>
                    </div>
            </x-form.card>
        </div>
    </x-form.form>
    @endBinding
@endsection

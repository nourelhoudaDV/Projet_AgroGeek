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
            <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/varietes.identification_Varietes')) }}">

                <x-form.input col="col-12 col-sm-6" name="nomCommercial" label="{{ trans('words.nomCommercial') }}" />

                <x-form.select col="col-12 col-sm-6" name="especes_id" label="{{ trans('words.especes_id') }}"
                                :bind-with="[
                \App\Models\Espece::all(),
                [
                    'id' ,  'nom'
                ]
                ]"
                    />
                <x-form.input col="col-12 col-sm-6" name="appelationAr" label="{{ trans('words.appelationAr') }}" />
                <x-form.input col="col-12 col-sm-12" name="qualite" label="{{ trans('words.qualite') }}" />
                <x-form.input col="col-12 col-sm-6" name="precocite" label="{{ trans('words.precocite') }}" />
                <x-form.input col="col-12 col-sm-6" name="resistance" label="{{ trans('words.resistance') }}" />
                <x-form.input col="col-12 col-sm-6" name="competitivite" label="{{ trans('words.competitivite') }}" />
                <x-form.text-area col="col-12 col-sm-12" name="description" label="description"/>


                <div class="col-12 mt-5">
                    <x-form.button/>
                </div>
            </x-form.card>
    </x-form.form>
    @endBinding
@endsection

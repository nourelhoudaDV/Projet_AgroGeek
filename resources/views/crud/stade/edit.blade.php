@extends('layout.master')
@include('include.blade-components')
@section('page_title', trans('pages/stades.update_stades'))
@section('breadcrumb')
    <x-group.bread-crumb page-tittle="{{ trans('pages/stades.edit_page_title') }}" :indexes="[
        ['name' => trans('words.Stade'), 'route' => route('stades.index')],
        ['name' => trans('pages/stades.update_stades'), 'current' => true],
    ]" />
@endsection
@section('content')
    @bind($model)
        <x-form.form method="post" action="{{ route('stades.update', $model[$model::PK]) }}">
                <x-form.card col="col-12 row" title='pages/stades.identification_stade'>
                    <x-form.input col="col-12 col-sm-6" name="nom" label="{{ trans('words.nom') }}" />
                    <x-form.input col="col-12 col-sm-6" name="phaseFin" label="{{ trans('words.phaseFin') }}" />
                    <x-form.select col="col-12 col-sm-6" name="espece" label="espece" :bind-with="[\App\Models\Espece::all(), ['ide', 'espece']]"/>
                    <x-form.text-area col="col-12 col-sm-6" name="description" label="description" />

                    <div class="col-12 mt-5">
                        <x-form.button />
                    </div>
                </x-form.card>
        </x-form.form>
    @endBinding
@endsection

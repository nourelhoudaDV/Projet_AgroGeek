@extends('layout.master')
@include('include.blade-components')

@section('page_title', '')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ '' }}"
        :indexes="[
        ['name' => '', 'route' => route('techniquesAgricole.index')],
        ['name' => '', 'current' => true],
    ]" />
@endsection


@section('content')

    <x-form.form
        method="post"
        action="{{ route('techniquesAgricole.store') }}"
    >

        <x-form.card col="col-12 row" title="{{ 'card title' }}">
            <x-form.input col="col-12 col-sm-6" name="nom" label="{{ 'nom' }}" />
            <x-form.text-area col="col-12 col-sm-6" name="fullNameG" label="{{ 'description' }}" />

            <div class="col-12 mt-5">
                <x-form.button />
            </div>
        </x-form.card>
    </x-form.form>

@endsection


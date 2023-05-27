@extends('layout.master')
@include('include.blade-components')

@section('page_title', '')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ '' }}"
        :indexes="[
        ['name' => 'liste des Techniques Agricole', 'route' => route('TechniquesAgricole.index')],
    ]" />
@endsection


@section('content')

    <x-form.form
        method="post"
        action="{{ route('TechniquesAgricole.store') }}"
    >

        <x-form.card col="col-12 row" title="ajouter">

            <div class="col-2">
              
                <x-form.file name="logo" required label="logo"/>
            </div>
            <div class="col-10">
                <x-form.input col="col-12" required name="titre" label="titre" />
                <x-form.text-area col="col-12" name="decription" label="decription" />
            </div>
            <div class="col-12 mt-5">
                <x-form.button />
            </div>
        </x-form.card>
    </x-form.form>

@endsection


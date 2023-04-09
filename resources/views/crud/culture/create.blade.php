@extends('layout.master')
@include('include.blade-components')
@section('page_title' ,'culture parcelle')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle= 'culture parcelle'
    />
@endsection
@section('content')

    <x-form.form
    method="post"
    action="{{ route('cpStore') }}"
    >
        <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/users.pagename')) }}">
            <x-form.select name="idV" label="{{ trans('words.')}}"
                        :bind-with="[
                \App\Models\Variete::all(),
                [
                    'idV' ,  'nomCommercial'
                ]
            ]"
            />

            <x-form.select name="idp" label="{{ trans('words.Parcelle') }}"
                        :bind-with="[
                \App\Models\Parcelle::all(),
                [
                    'idp' ,  'codification'
                ]
            ]"
            />

        </x-form.card>

    </x-form.form>

@endsection

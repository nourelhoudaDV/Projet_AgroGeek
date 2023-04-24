@extends('layout.master')
@include('include.blade-components')

@section('page_title', trans('pages/fermes.index_page_title'))
@section('breadcrumb')
    <x-group.bread-crumb page-tittle="{{ trans('pages/fermes.index_page_title') }}" :indexes="[
        [
            'name' => trans('pages/fermes.index_page_title'),
            'route' => route('fermes.index'),
        ],
    ]" />

@endsection


@section('content')
    @bind($collection)
        <x-table.data-table
        :actions="$actions"
        :heads="$heads"
        edit-route="fermes.show"
        delete-route="fermes.delete" />
    @endBinding


@endsection


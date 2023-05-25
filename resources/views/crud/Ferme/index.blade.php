@extends('layout.master')
@include('include.blade-components')

@section('page_title', 'Liste de Fermes')
@section('breadcrumb')
    <x-group.bread-crumb page-tittle="Liste de fermes" :indexes="[
        [
            'name' => 'Liste de fermes',
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


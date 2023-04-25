@extends('layout.master')
@include('include.blade-components')

@section('page_title', '')
@section('breadcrumb')
    <x-group.bread-crumb page-tittle="{{ '' }}" :indexes="[
        [
            'name' => '',
            'route' => '',
        ],
    ]" />

@endsection

@section('content')
    @bind($collection)
        <x-table.data-table
        :actions="$actions"
        :heads="$heads"
        edit-route="techniquesAgricole.show"
        delete-route="techniquesAgricole.delete" />
    @endBinding


@endsection


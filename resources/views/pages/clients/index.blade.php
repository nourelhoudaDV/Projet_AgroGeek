@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/clients.index_page_title'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/clients.index_page_title') }}"
        :indexes="[
           [
               'name'=> trans('pages/clients.index_page_title'),
               'route'=> route('clients.index')
           ],
        ]"
    />

@endsection
@section('content')
    @bind( $collection )
        <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="users.show"
            delete-route="users.delete"
        />
    @endBinding
@endsection



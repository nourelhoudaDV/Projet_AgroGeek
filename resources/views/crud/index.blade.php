@extends('layout.master')
@include('include.blade-components')



@section('page_title' , 'user list')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="liste des users"
        :indexes="[

            [
               'name'=> 'liste des users',
               'route'=> route('users.index')
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



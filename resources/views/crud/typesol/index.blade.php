@extends('layout.master')
@include('include.blade-components')



@section('page_title' , 'Type de sols liste')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="liste des Type de sols"
        :indexes="[

            [
               'name'=> 'liste des Type de sols',
               'route'=> route('typesols.index')
           ],
        ]"
    />

@endsection
@section('content')
    @bind( $collection )
        <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="typesols.show"
            delete-route="typesols.delete"
        />
    @endBinding
@endsection



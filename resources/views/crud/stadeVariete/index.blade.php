@extends('layout.master')
@include('include.blade-components')



@section('page_title' , 'Les données du Stade variete')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Les données du Stade variete"
        :indexes="[

            [
               'name'=> 'Les données du Stade variete',
               'route'=> route('stadeVarietes.index')
           ],
        ]"
    />

@endsection
@section('content')
    @bind( $collection )
        <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="stadeVarietes.show"
            delete-route="stadeVarietes.delete"
        />
    @endBinding
@endsection



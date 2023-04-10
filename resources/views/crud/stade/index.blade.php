@extends('layout.master')
@include('include.blade-components')



@section('page_title' , 'Les données des Stade')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Les données des Stade"
        :indexes="[

            [
               'name'=> 'Les données des Stade',
               'route'=> route('stades.index')
           ],
        ]"
    />

@endsection
@section('content')
    @bind( $collection )
        <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="stades.show"
            delete-route="stades.delete"
        />
    @endBinding
@endsection



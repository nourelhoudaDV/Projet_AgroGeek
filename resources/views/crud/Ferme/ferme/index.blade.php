@extends('layout.master')
@include('include.blade-components')



@section('page_title' , 'Les données du Ferme')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Les données du Ferme"
        :indexes="[

            [
               'name'=> 'Les données du Ferme',
               'route'=> route('fermes.index')
           ],
        ]"
    />

@endsection
@section('content')
    @bind( $collection )
        <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="fermes.show"
            delete-route="fermes.delete"
        />
    @endBinding
@endsection



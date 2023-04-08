@extends('layout.master')
@include('include.blade-components')



@section('page_title' , 'Espece list')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="liste des Especes"
        :indexes="[

            [
               'name'=> 'liste des Especes',
               'route'=> route('especes_models.index')
           ],
        ]"
    />

@endsection
@section('content')
    @bind( $collection )
        <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="especes_models.show"
            delete-route="especes_models.delete"
        />
    @endBinding
@endsection





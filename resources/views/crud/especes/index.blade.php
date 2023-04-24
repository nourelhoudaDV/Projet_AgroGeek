@extends('layout.master')
@include('include.blade-components')
@section('page_title' , "Les Especes")
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Especes"
        :indexes="[
             ['name'=> 'Les Varietes' , 'route'=> route('varietes.index')],
           [
               'name'=> 'Les Especes',
               'route'=> route('especes.index')
           ],
        ]"
    />

@endsection


@section('content')
    @bind( $collection )
    <x-table.data-table
        :actions="$actions"
        :heads="$heads"
        edit-route="especes.show"
        delete-route="especes.delete"
    />
    @endBinding
@endsection

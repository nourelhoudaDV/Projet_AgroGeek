
@extends('layout.master')
@include('include.blade-components')

@section('page_title' , 'Varietes list')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="liste des Variétés"
        :indexes="[
             ['name'=> 'Les Especes' , 'route'=> route('especes.index')],

            [
               'name'=> 'liste des Variétés',
               'route'=> route('varietes.index')
           ],
        ]"
    />

@endsection
@section('content')
    @bind( $collection )
        <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="varietes.show"
            delete-route="varietes.delete"
        />
    @endBinding
@endsection
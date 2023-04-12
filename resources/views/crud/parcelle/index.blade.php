@extends('layout.master')
@include('include.blade-components')



@section('page_title' , 'Les données du parcelle')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Les données du parcelle"
        :indexes="[

            [
               'name'=> 'Les données du parcelle',
               'route'=> route('parcelles.index')
           ],
        ]"
    />

@endsection
@section('content')
    @bind( $collection )
        <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="parcelles.show"
            delete-route="parcelles.delete"
        />
    @endBinding
@endsection



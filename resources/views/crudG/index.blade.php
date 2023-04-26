@extends('layout.master')
@include('include.blade-components')



@section('page_title' , trans('pages/Gerants.index_page_title'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{trans('pages/Gerants.index_page_title')}}"
        :indexes="[
            [
               'name'=> trans('pages/Gerants.Liste_des_Gérants'),
               'route'=> route('GerantFermes.index')
           ],
        ]"
    />

@endsection
@section('content')
    @bind( $collection )
        <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="GerantFermes.show"
            delete-route="GerantFermes.delete"
        />
    @endBinding
@endsection



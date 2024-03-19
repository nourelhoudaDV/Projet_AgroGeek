@extends('layout.master')
@include('include.blade-components')


@section('page_title', 'Techniques Agricole')



@section('content')
    @bind($collection)
        <x-table.data-table
        :actions="$actions"
        :heads="$heads"
        edit-route="TechniquesAgricole.show"
        delete-route="TechniquesAgricole.delete" />
    @endBinding
@endsection


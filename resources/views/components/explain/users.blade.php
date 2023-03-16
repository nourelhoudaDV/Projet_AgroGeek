@extends("layouts.app")
@include('components.config.consult')
@section("wrapper")
    <x-group.bread-crumb :dash="true" :pages="$data['pages']" :links="$data['crudlinks']"/>

    @bind($data['collection'])
    <x-table.data-table
        title="list des users"
        :datatableColumns="$data['tablesCols']"
        primary-key="id"
        edit-route="show.user"
        delete-route="delete.user"
    />
    @endBinding
@endsection







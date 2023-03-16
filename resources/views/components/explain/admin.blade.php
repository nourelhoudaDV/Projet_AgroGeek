@extends("layouts.app")
@include('components.config.consult')
@section("wrapper")
    <x-group.bread-crumb :dash="true" :pages="$data['pages']" :links="$data['crudlinks']"/>

    @bind($data['collection'])
    <x-table.data-table
        title="list des admins"
        :datatableColumns="$data['tablesCols']"
        primary-key="id"
        edit-route="show.admin"
        delete-route="delete.admin"
    />
    @endBinding
@endsection





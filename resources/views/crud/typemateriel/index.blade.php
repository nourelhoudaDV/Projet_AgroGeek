@extends('layout.master')
@include('include.blade-components')

@section('page_title', 'Liste des types de matériel')

@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Liste des types de matériel"
        :indexes="[
            [
                'name' => 'Accueil',
                'route' => route('dashboard.index')
            ],
            [
                'name' => 'Types de matériel',
                'route' => route('typesMateriel.index')
            ]
        ]"
    />
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="card-title">Liste des types de matériel</h4>
                <a href="{{ route('typesMateriel.create') }}" class="btn btn-primary">Ajouter un type de matériel</a>
            </div>

            <x-table.data-table
                :heads="[
                    'ID',
                    'Nom',
                    'Description',
                    'Action'
                ]"
                :collection="$typesMateriel"
                edit-route="typesMateriel.edit"
                delete-route="typesMateriel.delete"
            >
                @foreach($typesMateriel as $typeMateriel)
                    <tr>
                        <td>{{ $typeMateriel->idTM }}</td>
                        <td>{{ $typeMateriel->nom }}</td>
                        <td>{{ $typeMateriel->description }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('typesMateriel.edit', $typeMateriel->idTM) }}" class="btn btn-sm btn-warning">Editer</a>
                                <button data-id="{{ $typeMateriel->idTM }}" class="btn btn-sm btn-danger btn-delete">Supprimer</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-table.data-table>
        </div>
    </div>

    <x-group.delete-confirm-modal
        title="Supprimer un type de matériel"
        message="Êtes-vous sûr de vouloir supprimer ce type de matériel ?"
        form-id="form-delete"
    />
@endsection

@section('scripts')
    <script>
        $(function () {
            $('.btn-delete').click(function () {
                var id = $(this).data('id');
                $('#form-delete').attr('action', '{{ route('typesMateriel.delete', ':id') }}'.replace(':id', id));
                $('#deleteConfirmModal').modal('show');
            });
        });
    </script>
@endsection

@extends('layout.master')
@include('include.blade-components')

@section('page_title', 'Gestion des qualifications')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Gestion des qualifications"
        :indexes="[
            [
                'name' => 'Accueil',
                'route' => route('home')
            ],
            [
                'name' => 'Gestion des qualifications'
            ]
        ]"
    />
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Liste des qualifications</h3>
            <div class="card-tools">
                <a href="{{ route('qualifications.create') }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-plus"></i> Ajouter une qualification
                </a>
            </div>
        </div>
        <div class="card-body">
            <x-table.data-table
                :heads="[
                    'ID',
                    'Nom',
                    'Description',
                    'Technique agricole',
                    'Actions'
                ]"
                :items="$qualifications"
                :edit-route="'qualifications.edit'"
                :delete-route="'qualifications.destroy'"
            >
                @foreach($qualifications as $qualification)
                    <tr>
                        <td>{{ $qualification->idQ }}</td>
                        <td>{{ $qualification->nom }}</td>
                        <td>{{ $qualification->description }}</td>
                        <td>{{ $qualification->techniqueA->nom }}</td>
                        <td>
                            <div class="d-flex justify-content-start">
                                <a href="{{ route('qualifications.edit', ['qualification' => $qualification->idQ]) }}"
                                   class="btn btn-primary btn-sm mr-2">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{ route('qualifications.destroy', ['qualification' => $qualification->idQ]) }}"
                                      method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-table.data-table>
        </div>
    </div>
@endsection

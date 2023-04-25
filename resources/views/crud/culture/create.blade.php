@extends('layout.master')
@include('include.blade-components')
@section('page_title' ,'culture parcelle')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle= 'culture parcelle'
        :indexes="[
        ['name'=> 'dashboard' , 'route'=> '/'],
        ['name'=> 'pages/culture.Ajouter noveau cultureParcelle' ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')

    <x-form.form
    method="post"
    action="{{ route('cultureparcelle.store') }}"
    >

        <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/users.pagename')) }}">
            {{-- <x-form.select name="idV" label="{{ trans('words.')}}"
                        :bind-with="[
                \App\Models\Variete::all(),
                [
                    'idV' ,  'nomCommercial'
                ]
            ]"
            /> --}}

            <x-form.select name="idp" label="{{ trans('words.Parcelle') }}"
                        :bind-with="[
                \App\Models\Parcelle::all(),
                [
                    'idp' ,  'codification'
                ]
            ]"
            />

            @bind( $collection )
            <x-table.data-table
                :heads="$heads"
            />
        @endBinding

            <div class="col-12 mt-5">
                <x-form.button/>
            </div>

        </x-form.card>

    </x-form.form>

@endsection

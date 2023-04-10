@extends('layout.master')
@include('include.blade-components')

@section('page_title', 'Ajouter noveau Stade')
@section('breadcrumb')
    <x-group.bread-crumb page-tittle='Ajouter noveau Stade' :indexes="[
        ['name' => 'Stade', 'route' => route('stades.index')],
        ['name' => 'pages/stades.Ajouter noveau Stade', 'current' => true],
    ]" />
@endsection


@section('content')

    <x-form.form method="post" action="{{ route('stades.store') }}">
            <x-form.card col="col-12 row" title='pages/parcelle.identification_stade'>
                <x-form.input col="col-12 col-sm-6" name="nom" label="{{ trans('words.nom') }}" />
                <x-form.input col="col-12 col-sm-6" name="phaseFin" label="{{ trans('words.phaseFin') }}" />
                <x-form.select col="col-12 col-sm-6" name="espece" label="espece" :bind-with="[\App\Models\Espece::all(), ['ide', 'espece']]"/>
                <x-form.text-area col="col-12 col-sm-6" name="description" label="description" />

                <div class="col-12 mt-5">
                    <x-form.button />
                </div>
            </x-form.card>
    </x-form.form>
@endsection


{{-- @push('scripts')
    <script src="{{ asset('assets/js/custom/crud/users/create.js') }}"></script>
@endpush --}}

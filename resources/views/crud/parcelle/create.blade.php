@extends('layout.master')
@include('include.blade-components')

@section('page_title', 'Ajouter noveau parcelle')
@section('breadcrumb')
    <x-group.bread-crumb page-tittle='Ajouter noveau parcelle' :indexes="[
        // ['name' => 'liste de parcelles', 'route' => route('parcelles.index')],
        ['name' => 'ajouter un parcelle', 'current' => true],
    ]" />
@endsection


@section('content')

    <x-form.form method="post" action="{{ route('parcelles.store') }}">

        <x-form.card col="col-12 row" title='identification parcelle'>
            <input type="hidden" name="Ferme" value="{{ $fermeId }}">
            <x-form.select col="col-12 col-sm-6" name="typeSol" label="typeSol" :bind-with="[\App\Models\TypeSol::all(), [\App\Models\TypeSol::PK, 'vernaculaure']]" {{-- ['idTS', 'typeSol']]" --}} />
            <x-form.input col="col-12 col-sm-6" name="codification" label="codification" />
            <x-form.input required type="number" col="col-12 col-sm-3" name="superficie" label="superficie" />
            <x-form.radios required col="col-12 col-sm-9" name="modeCulture" label="modeCulture"
                :radios="[
                    [
                        'value' => 'S',
                        'label' => 'Simple',
                    ],
                    [
                        'value' => 'M',
                        'label' => 'Mixte',
                    ],
                    [
                        'value' => 'E',
                        'label' => 'Etagère',
                    ],
                ]" />
            <x-form.input type='number' col="col-12 col-sm-3" name="pente" label="pente" />
            <x-form.input type='number' col="col-12 col-sm-3" name="pierosite" label="pierosite" />
            <x-form.input col="col-12 col-sm-6" name="gps" label="gps" />
            <x-form.text-area col="col-12 col-sm-12" name="topographie" label="topographie" />
            <x-form.text-area col="col-12 col-sm-12" name="description" label="description" />

            <div class="col-12 mt-5">
                <x-form.button />
            </div>

        </x-form.card>

    </x-form.form>

@endsection

@isset($fermeId)
    @push('scripts')
        <script>
            $('[name=ferme]').val({{ $fermeId }});
        </script>
    @endpush
@endisset
@isset($typesolId)
    @push('scripts')
        <script>
            $('[name=typesol]').val({{ $typesolId }});
        </script>
    @endpush
@endisset

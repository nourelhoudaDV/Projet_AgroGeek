@extends('layout.master')
@include('include.blade-components')

@section('page_title', 'Ajouter noveau parcelle')
@section('breadcrumb')
    <x-group.bread-crumb page-tittle='Ajouter noveau parcelle' :indexes="$pagesIndexes" {{-- [
        ['name' => 'Parcelle', 'route' => route('fermes.index')],
        ['name' => 'pages/parcelles.Ajouter noveau parcelle', 'current' => true],
    ]"  --}} />
@endsection


@section('content')

    <x-form.form method="post" action="{{ route('parcelles.store') }}">

        <x-form.card col="col-12 row" title='pages/parcelle.identification_parcelle'>

            <x-form.input col="col-12 col-sm-6" name="codification" label="{{ trans('words.codification') }}" />
            <x-form.select col="col-12 col-sm-6" name="Ferme" label="Ferme" :bind-with="[\App\Models\Ferme::allForSelect(), [\App\Models\Ferme::PK, 'ferme_name']]" />
            <x-form.input col="col-12 col-sm-3" name="superficie" label="superficie" />
            <x-form.radios col="col-12 col-sm-9" name="modeCulture" label="{{ trans('words.modeCulture') }}"
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
            <x-form.text-area col="col-12 col-sm-6" name="topographie" label="topographie" />
            <x-form.input col="col-12 col-sm-3" name="pente" label="pente" />
            <x-form.input col="col-12 col-sm-3" name="pierosite" label="pierosite" />
            <x-form.input col="col-12 col-sm-6" name="gps" label="gps" />
            <x-form.text-area col="col-12 col-sm-12" name="description" label="description" />
            <x-form.select col="col-12 col-sm-6" name="typeSol" label="typeSol" :bind-with="[\App\Models\TypeSol::allForSelect(), [\App\Models\TypeSol::PK, 'typesol_name']]" {{-- ['idTS', 'typeSol']]" --}} />

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

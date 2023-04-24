@extends('layout.master')
@include('include.blade-components')

@section('page_title', 'Ajouter noveau Stade variete')
@section('breadcrumb')
    <x-group.bread-crumb
    page-tittle="Ajoute Stade Variete"
    :indexes="$pagesIndexes"

    />
@endsection


@section('content')

    <x-form.form method="post" action="{{ route('stadevarietes.store') }}">
            <x-form.card col="col-12 row" title='Entre les informations de Stade Variete'>
                <x-form.input col="col-12 col-sm-6" name="nom" label="nom" />
                <x-form.input col="col-12 col-sm-6" name="phaseFin" label="phase de Fin" />
                <x-form.select col="col-12 col-sm-6" name="espece" label="espece" :bind-with="[\App\Models\Espece::allForSelect(), [\App\Models\Espece::PK,  'espece_name']]"/>
                <x-form.select col="col-12 col-sm-6" name="variete" label="variete" :bind-with="[\App\Models\Variete::allForSelect(),  [\App\Models\Variete::PK, 'variete_nom']]"/>
                <x-form.input col="col-12 col-sm-4" name="sommesTemps" label="sommesTemps"/>
                <x-form.input col="col-12 col-sm-4" name="sommesTempFroid" label="sommesTempFroid"/>
                <x-form.input col="col-12 col-sm-4" name="Kc" label="Kc"/>
                <x-form.input col="col-12 col-sm-3" name="enracinement" label="enracinement"/>
                <x-form.radios col="col-12 col-sm-3" name="maxEnracinement" label="maximum d'Enracinement"
                    :radios="[
                        [
                            'value' => 'Y',
                            'label' => 'Oui',
                        ],
                        [
                            'value' => 'N',
                            'label' => 'Non',
                        ],
                    ]" />
                <x-form.text-area col="col-12 col-sm-6" name="description" label="description" />

                <div class="col-12 mt-5">
                    <x-form.button />
                </div>
            </x-form.card>
    </x-form.form>
@endsection

@isset($especeId)
    @push('scripts')
        <script>
            $('[name=espece]').val({{ $especeId }});
        </script>
    @endpush
@endisset

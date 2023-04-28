@extends('layout.master')
@include('include.blade-components')
@section('page_title' , 'Ajoute Stade')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Ajoute Stade"
        :indexes="$pagesIndexes"
    />
@endsection
@section('content')
    <x-form.form
        method="post"
        action="{{ route('stades.store') }}"
    >
        <x-form.card col="col-12 row" title="Entree Les Informations De Stade">

            <x-form.input required col="col-12 col-sm-6" name="nom" label="nom"/>
            <x-form.input required col="col-12 col-sm-6" name="phaseFin" label="phaseFin"/>
            <x-form.select
                col="col-12 col-sm-6"
                required
                name="espece"
                label="espece"
                :bind-with="[\App\Models\Espece::allForSelect(), [\App\Models\Espece::PK , 'espece_name']]"
            />
            <x-form.text-area col="col-12 col-sm-6" name="description" label="description"/>
            <div class="col-12 mt-5">
                <x-form.button/>
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

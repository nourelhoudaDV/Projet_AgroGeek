@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/varietes.add_a_new_user'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/varietes.create_page_title') }}"
        :indexes="[
        ['name'=> trans('words.variete') , 'route'=> route('varietes.index')],
        ['name'=> trans('pages/varietes.add_a_new_user') ,     'current' =>true ],
    ]"
    />
@endsection


@section('content')

    <x-form.form
        method="post"
        action="{{ route('varietes.store') }}"
    >
        <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/varietes.identification_Varietes')) }}">
                <x-form.select col="col-12 col-sm-6" name="especes_id" label="{{ trans('words.especes_id') }}"
                               :bind-with="[
                    \App\Models\Espece::all(),
                    [
                        'ide' ,  'nom'
                    ]
                ]"
                />
                <x-form.input col="col-12 col-sm-6" name="nomCommercial" label="{{ trans('words.nomCommercial') }}"/>
                <x-form.input col="col-12 col-sm-6" name="appelationAr" label="{{ trans('words.appelationAr') }}"/>
                <x-form.input col="col-12 col-sm-12" name="qualite" label="qualite"/>
                <x-form.input col="col-12 col-sm-6" name="precocite" label="precocite"/>
                <x-form.input col="col-12 col-sm-6" name="resistance" label="resistance"/>
                <x-form.input col="col-12 col-sm-6" name="competitivite" label="competitivite"/>
                <x-form.text-area col="col-12 col-sm-12" name="description" label="description"/>
                <div class="col-12 mt-5">
                    <x-form.button/>
                </div>
        </x-form.card>
    </x-form.form>
@endsection


{{-- @push('scripts')
    <script src="{{ asset('assets/js/custom/crud/varietes/create.js') }}"></script>
@endpush --}}

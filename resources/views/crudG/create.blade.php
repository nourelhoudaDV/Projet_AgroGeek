@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/Gérants.add_a_new_Gérant'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/Gerants.create_page_title') }}"
        :indexes="[
        ['name'=> trans('words.Gérant') , 'route'=> route('GerantFermes.index')],
        ['name'=> trans('pages/Gerants.add_a_new_Gérant') ,     'current' =>true ],
    ]"
    />
@endsection


@section('content')

    <x-form.form
        method="post"
        action="{{ route('GerantFermes.store') }}"
    >
        <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/Gerants.edit_form_title')) }}">

            
            <div class="col-10 row">
                <x-form.input name="nomG" label="{{ trans('words.nom') }}"/>
                <x-form.input name="prenomG" label="{{ trans('words.prenom') }}"/>
                <x-form.input name="telephone" label="{{ trans('words.telephone') }}"/>
                <x-form.input name="cin" label="{{ trans('words.cin') }}"/>
                <x-form.input name="email" label="{{ trans('words.email') }}"/>

               
               


                <div class="col-12 mt-5">
                    <x-form.button/>
                </div>
        </x-form.card>

    </x-form.form>
@endsection


@push('scripts')
    <script src="{{ asset('assets/js/custom/crud/GerantFermes/create.js') }}"></script>
@endpush

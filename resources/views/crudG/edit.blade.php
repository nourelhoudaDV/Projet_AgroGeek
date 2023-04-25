@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/Gerants.update_Gérant'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/Gerants.edit_page_title') }}"
        :indexes="[
        ['name'=> trans('words.Gérant') , 'route'=> route('GerantFermes.index')],
        ['name'=> trans('pages/Gerants.update_Gérant') ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')
    @bind($model)

    <x-form.form
        method="post"
        action="{{ route('GerantFermes.update' , $model[$model::PK]) }}"
    >
        <div class="col-12 row">
            <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/Gerants.edit_form_title')) }}">

                
                <div class="col-10 row">
                    <x-form.input   name="nomG" label="{{ trans('words.name') }}" />
                    <x-form.input   name="prenomG" label="{{ trans('words.prenom') }}" />
                    <x-form.input   name="telephone" label="{{ trans('words.telephone') }}" />
                    <x-form.input   name="cin" label="{{ trans('words.cin') }}" />
                    <x-form.input   name="email" label="{{ trans('words.email') }}" />





                    <div class="col-12 mt-5">
                        <x-form.button/>
                    </div>
            </x-form.card>
        </div>
    </x-form.form>
    @endBinding
@endsection

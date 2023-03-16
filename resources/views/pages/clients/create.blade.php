@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/clients.create_page_title'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/clients.create_page_title') }}"
        :indexes="[
        ['name'=> trans('words.clients') , 'route'=> route('clients.index')],
        ['name'=> trans('words.add') ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')

    <x-form.form
        method="post"
        action="{{ route('clients.store') }}"
    >

        <x-form.card col="col-12" title="{{ ucwords(trans('pages/clients.edit_form_title')) }}">
            <x-form.file required col="col-6" name="avatar" :label="ucwords(trans('words.avatar'))"/>
            <x-form.file required col="col-6" name="logo" :label="ucwords(trans('words.logo'))"/>
            <x-form.input required col="col-12 col-sm-6" name="name" :label="ucwords(trans('words.name'))"/>
            <x-form.input-date col="col-12 col-sm-6" name="birthday" :label="ucwords(trans('words.birthday'))"/>
            <x-form.input required col="col-12 col-sm-6" name="country" :label="ucwords(trans('words.country'))"/>
            <x-form.input required col="col-12 col-sm-6" name="city" :label="ucwords(trans('words.city'))"/>
            <x-form.select
                col="col-12"

                name="gender"
                :label="ucwords(trans('words.gender'))"
                :options="[
                        'M' => trans('words.man'),
                        'W'=> trans('words.woman'),
                    ]"
            />

            <div class="col-12 mt-5">
                <x-form.button/>
            </div>
        </x-form.card>

    </x-form.form>
@endsection

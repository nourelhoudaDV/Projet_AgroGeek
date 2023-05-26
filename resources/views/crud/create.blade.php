@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/users.add_a_new_user'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/users.create_page_title') }}"
        :indexes="[
        ['name'=> trans('words.user') , 'route'=> route('users.index')],
        ['name'=> trans('pages/users.add_a_new_user') ,     'current' =>true ],
    ]"
    />
@endsection


@section('content')

    <x-form.form
        method="post"
        action="{{ route('users.store') }}"
    >
        <x-form.card col="row" title="{{ ucwords(trans('pages/users.edit_form_title')) }}">

            <div class="col-2">
                <x-form.file name="avatar" label="{{ trans('words.avatar') }}"/>
            </div>
            <div class="col-10 row">
                <x-form.input name="full_name" label="{{ trans('words.name') }}"/>
                <x-form.input-date name="date_of_birth" label="{{ trans('words.date') }}"/>
                <x-form.select name="country_id" label="{{ trans('words.country') }}"
                               :bind-with="[
                    \App\Models\Country::all(),
                    [
                        'id' ,  'name'
                    ]
                ]"
                />
                <x-form.radios

                    name="gender"
                    label="{{ trans('words.gender') }}"
                    :radios="[
                        [
                            'value' => 'M',
                            'label' => 'Man',
                        ],
                         [
                            'value' => 'W',
                            'label' => 'Woman',
                        ]
                ]"

                />


                <div class="col-12 mt-5">
                    <x-form.button/>
                </div>
        </x-form.card>

    </x-form.form>
@endsection


@push('scripts')
    <script src="{{ asset('assets/js/custom/crud/users/create.js') }}"></script>
@endpush

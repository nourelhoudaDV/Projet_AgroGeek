@extends('layout.master')
@include('include.blade-components')
@section('page_title' , trans('pages/users.update_user'))
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="{{ trans('pages/users.edit_page_title') }}"
        :indexes="[
        ['name'=> trans('words.user') , 'route'=> route('users.index')],
        ['name'=> trans('pages/users.update_user') ,     'current' =>true ],
    ]"
    />
@endsection
@section('content')
    @bind($model)

    <x-form.form
        method="post"
        action="{{ route('users.update' , $model[$model::PK]) }}"
    >
        <div class="col-12 row">
            <x-form.card col="col-12 row" title="{{ ucwords(trans('pages/users.edit_form_title')) }}">

                <div class="col-2">
                    <x-form.file required name="avatar" label="{{ trans('words.avatar') }}" />
                </div>
                <div class="col-10 row">
                    <x-form.input   name="full_name" label="{{ trans('words.name') }}" />
                    <x-form.input-date
                        :picker-type="\App\View\Components\Form\InputDate::DATE" name="date_of_birth" label="{{ trans('words.date') }}" />



                    <x-form.select  name="country_id" label="{{ trans('words.country') }}"
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
        </div>
    </x-form.form>
    @endBinding
@endsection

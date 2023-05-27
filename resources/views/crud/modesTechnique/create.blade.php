@extends('layout.master')
@include('include.blade-components')
@section('page_title' , 'Ajouter modes technique')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Ajouter modes technique"
        :indexes="[
        ['name'=> 'retour' , 'route'=> route('TechniquesAgricole.show',$idta)],
        ['name'=> 'Ajoute ModesTechnique' ,     'current' =>true ],
    ]"
    />
@endsection


@section('content')

    <x-form.form
        method="post"
        action="{{ route('ModesTechnique.store') }}"
    >
        <x-form.card col="col-12 row" title="Entre les informations des modes technique">

                <input type="hidden" value="{{ $idta }}" name="idTA"/>
                <x-form.input name="titre" required label="titre"/>
                <x-form.text-area  name="description" label="description"/>

                <div class="col-12 mt-5">
                    <x-form.button/>
                </div>
        </x-form.card>

    </x-form.form>
@endsection

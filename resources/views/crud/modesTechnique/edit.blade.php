@extends('layout.master')
@include('include.blade-components')
@section('page_title' , 'modifier mode technique')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="modifier mode technique"
        :indexes="[
            ['name'=> 'retour' , 'route'=> route('TechniquesAgricole.show',$model['idTechFK'])],
            ['name'=> 'modifier le ModesTechnique' ,     'current' =>true ],
        ]"
    />
@endsection


@section('content')

    <x-form.form
        method="post"
        action="{{ route('ModesTechnique.update' , ['id' => $model[$model::PK]]) }}"
    >
        <x-form.card col="col-12 row" title="Entre les informations des modes technique">

            
                <x-form.input name="titre" required label="titre"/>
                <x-form.text-area  name="description" label="description"/>

                <div class="col-12 mt-5">
                    <x-form.button/>
                </div>
        </x-form.card>

    </x-form.form>
@endsection

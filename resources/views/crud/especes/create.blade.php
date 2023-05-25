@extends('layout.master')
@include('include.blade-components')
@section('page_title' , 'Ajoute Espece')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Ajoute Espece"
        :indexes="[
        ['name'=> 'Les Especes' , 'route'=> route('especes.index')],
        ['name'=> 'Ajoute Espece',     'current' =>true ],
    ]"
    />
@endsection
@section('content')
    <x-form.form
        method="post"
        action="{{ route('especes.store') }}"
    >
        <x-form.card col="col-12 row" title="Entree Les Informations D'espece">

            <x-form.input required col="col-12 col-md-6" name="nomSc" label="nom d'espece"/>
            <x-form.input required col="col-12 col-md-6" name="nomCommercial" label="nom commercial"/>
            <x-form.input  col="col-12 col-md-6" name="appelationAr" label="appelation Ar"  />
            <x-form.select
                col="col-12 col-md-6"

                name="categorieEspece"
                label="categorie d'espece"
                :options="[
                    'ceriales' =>' Ceriales',
                    'legumineuses' =>' Legumineuses',
                    'arboreculture' =>' Arboreculture',
                    'argrumes' =>' Argrumes',


                ]"
            />

            <x-form.input  col="col-12 col-md-6" name="typeEnracinement" label="type enracinement"  />
            <x-form.text-area  col="col-12 col-md-6" name="description" label="description"  />







            <div class="col-12 mt-5">
                <x-form.button/>
            </div>
        </x-form.card>

    </x-form.form>

@endsection

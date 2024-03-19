@extends('layout.master')
@include('include.blade-components')
@section('page_title' , 'Ajoute Variete')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="Ajoute Variete"
        :indexes="[                
            ['name'=> 'retour' , 'route'=> route('especes.show',$especeId)],
            ['name'=> 'Ajoute Variete' ,     'current' =>true ],
    ]"
    />
@endsection


@section('content')

    <x-form.form
        method="post"
        action="{{ route('varietes.store') }}"
    >
        <x-form.card col="col-12 row" title="Entre les informations des Varietes">
            
         
            <x-form.input required  name="nomCommercial" col="col-12 col-md-6" label="nom Commercial"/>
            <x-form.input required  name="appelationAr" col="col-12 col-md-6" label="appelation Ar"/>
            <x-form.input required col="col-12 col-md-4" name="quantite" label="quantite"/>
            <x-form.input required col="col-12 col-md-4" name="precocite" label="precocite"/>
            <x-form.input required col="col-12 col-md-4" name="resistance" label="resistance"/>
            <x-form.input required col="col-12 col-md-6" name="competitivite" label="competitivite"/>
            <x-form.text-area  name="description" label="description"/>
            <input type="hidden" name="espece" value="{{$especeId }}">
        
            <div class="col-12 mt-5">
                <x-form.button/>
            </div>
        </x-form.card>

    </x-form.form>
@endsection

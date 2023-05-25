@extends('layout.master')
@include('include.blade-components')

@section('page_title', 'Modifier le ferme')
@section('breadcrumb')
    <x-group.bread-crumb page-tittle="Modifier le ferme" :indexes="[
        ['name' => 'liste de fermes', 'route' => route('fermes.index')],
        ['name' => 'modifier le ferme', 'current' => true],
    ]" />
@endsection


@section('content')

    @bind($model)
        <x-form.form method="post" action="{{ route('fermes.update', $model[$model::PK]) }}">

            <x-form.card col="col-12 row" title="identifiant ferme">

                <x-form.file col=" col-md-2" name="logo" label="logo" />
                <div class="col-md-10 row">
                    
                    <x-form.input required  name="nomDomaine" label="Nom de Ferme" />
                    <x-form.input required col="col-12 col-md-4" name="fullNameG" label="Nom Gerant" />
                    <x-form.input required col="col-12 col-md-4" name="cin" label="CIN" />
                    <x-form.input col="col-12 col-md-4" name="contactG" label="Contact Gerant" />
                    <x-form.input col="col-12 col-md-6" name="SAT" label="Superficie Agricole Totale" />
                    <x-form.input col="col-12 col-md-6" name="SAU" label="Superficie Agricole Utile" />
                    <x-form.text-area col="col-12 col-md-12" name="observation" label="Observation" />
                </div>
    
            </x-form.card>
    
            <x-form.card col="col-12 row" title="Contact">
    
                <x-form.input col="col-12 col-md-3" name="fixe" label="fix" />
                <x-form.input col="col-12 col-md-3" name="fax" label="fax" />
                <x-form.input col="col-12 col-md-3" name="GSM1" label="GSM1" />
                <x-form.input col="col-12 col-md-3" name="GSM2" label="GSM2" />
                <x-form.input col="col-12 col-md-6" name="email" label="email" />
                <x-form.input col="col-12 col-md-6" name="siteWeb" label="siteWeb" />
    
            </x-form.card>
    
            <x-form.card col="col-12 row" title="Adresse">
    
                <x-form.input col="col-12 col-md-6" name="Douar" label="Douar" />
                <x-form.input col="col-12 col-md-6" name="Cercle" label="Cercle" />
                <x-form.input col="col-12 col-md-6" name="province" label="province" />
                <x-form.input col="col-12 col-md-6" name="region" label="region" />
                <x-form.text-area col="col-12 col-md-12" name="adresse" label="adresse" />
                <x-form.input col="col-12 col-md-6" name="gps" label="gps" />
                <x-form.input col="col-12 col-md-6" name="ville" label="ville" />
    
                <div class="col-12 mt-5">
                    <x-form.button />
                </div>
    
            </x-form.card>

        </x-form.form>
    @endBinding

    <x-form.card col="col-12 row" title="Historique">

        <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#kt_parcelles_tab">Parcelle</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#kt_typesols_tab">Type de sol</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="kt_parcelles_tab" role="tabpanel">

                @bind($model->parcelles)
                <x-table.data-table
                    :actions="$actions"
                    :heads="$heads"
                    edit-route="parcelles.show"
                    delete-route="parcelles.delete"
                    />
                @endBinding
            </div>

            <div class="tab-pane fade show" id="kt_typesols_tab" role="tabpanel">
                @bind($typesols)
                <x-table.data-table
                    :actions="$actions2"
                    :heads="$heads2"
                    edit-route="typesols.show"
                    delete-route="typesols.delete"
                />
                @endBinding
            </div>

        </div>

    </x-form.card> 

@endsection

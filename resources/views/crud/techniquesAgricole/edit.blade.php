@extends('layout.master')
@include('include.blade-components')

@section('page_title', 'modifier le Technique Agricole')
@section('breadcrumb')
    <x-group.bread-crumb page-tittle="Techniques Agricole" 
    :indexes="[
        ['name'=> 'Les TechniquesAgricole' , 'route'=> route('TechniquesAgricole.index')],
        ['name'=> 'modifier le Technique Agricole' ,     'current' =>true ],
    ]"
    />
@endsection


@section('content')

    @bind($model)
        <x-form.form method="post" action="{{ route('TechniquesAgricole.update', $model[$model::PK]) }}">

            <x-form.card col="col-12 row" title="edit">

                <div class="col-2">
                    <x-form.file name="logo" required label="logo"/>
                </div>
                <div class="col-10">
                    <x-form.input col="col-12" required name="titre" label="titre" />
                    <x-form.text-area col="col-12" name="decription" label="decription" />
                </div>
               
    
                <div class="col-12 mt-5">
                    <x-form.button />
                </div>
            </x-form.card>
        </x-form.form>
    @endBinding



    <x-form.card col="col-12 row" title="Historique">

        <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#kt_ModeTechnique">Mode Technique</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#kt_Qualificationtechnique">Qualification technique</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#kt_typeMateriel">type Materiel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#kt_TechniquesAgricole">techniques Specifiques</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            
            <div class="tab-pane fade show active" id="kt_ModeTechnique" role="tabpanel">
              
                @bind($data['ModesTechniques']['collection'])
                <x-table.data-table
                    :actions="$data['ModesTechniques']['actions']"
                    :heads="$data['ModesTechniques']['heads']"
                    edit-route="ModesTechnique.show"
                    delete-route="ModesTechnique.delete"
                    />
                @endBinding
            </div>

            <div class="tab-pane fade show" id="kt_Qualificationtechnique" role="tabpanel">
                @bind($data['Qualifications']['collection'])
                <x-table.data-table
                    :actions="$data['Qualifications']['actions']"
                    :heads="$data['Qualifications']['heads']"
                    edit-route="qualifications.show"
                    delete-route="qualifications.delete"
                />
                @endBinding
            </div>

            <div class="tab-pane fade show" id="kt_typeMateriel" role="tabpanel">
                @bind($data['typeMateriel']['collection'])
                <x-table.data-table
                    :actions="$data['typeMateriel']['actions']"
                    :heads="$data['typeMateriel']['heads']"
                    edit-route="typeMateriel.show"
                    delete-route="typeMateriel.delete"
                   
                />
                @endBinding
            </div>

            <div class="tab-pane fade show" id="kt_TechniquesAgricole" role="tabpanel">
                @bind($data['techniquesSpecifiques']['collection'])
                <x-table.data-table
                    :actions="$data['techniquesSpecifiques']['actions']"
                    :heads="$data['techniquesSpecifiques']['heads']"
                    edit-route="TechniqueSpecifique.show"
                    delete-route="TechniqueSpecifique.delete"
                />
                @endBinding
            </div>

        </div>

    </x-form.card> 

@endsection

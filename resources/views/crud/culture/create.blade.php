@extends('layout.master')
@include('include.blade-components')
@section('page_title' ,'culture parcelle')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle= 'les cultures de chaque parcelle'
        :indexes="[
        ['name'=> 'dashboard' , 'route'=> '/'],
        ['name'=> 'Ajouter noveau cultureParcelle' ,     'current' =>true ],
        ]"
    />
@endsection
@section('content')

    <x-form.form
        method="post"
        action="{{ route('cultureparcelle.store') }}"
    >

        <x-form.card col="col-12 row" title="les cultures de chaque parcelle">

            <x-form.select name="idp" id="idp" label="Parcelle" class="col-12 col-md-6"
                           :bind-with="[
                \App\Models\Parcelle::all(),
                [
                    'idp' ,  'codification'
                ]
            ]"
            />

            <div class="card">
                <div class="card-body py-4">
                    <div class="table-responsive">
            <!-- Affichage du tableau avec les variétés -->
                <table class="table align-middle table-row-dashed fs-6 gy-4">
                    <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">

                            <th class="no-sort  w-10px pe-2">
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input id="" class="form-check-input" type="checkbox"
                                           value="1" />
                                </div>

                            </th>

                        <th class="min-w-100px">espece</th>
                        <th class="min-w-100px">nomCommercial</th>
                        <th class="min-w-100px">appelationAr</th>
                        <th class="min-w-100px">quantite</th>
                        <th class="min-w-100px">precocite</th>
                        <th class="min-w-100px">resistance</th>
                        <th class="min-w-100px">competitivite</th>
                        <th class="min-w-100px">description</th>

                    </tr>
                    </thead>
                    <tbody id="tbody" class="fw-bold text-gray-600">
                    
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5">
                <x-form.button/>
            </div>
            <span name="varietes" data-variete="{{ (\App\Models\Variete::all()) }}" ></span>
            <span name="culture" data-culture="{{ (\App\Models\CultureParcelle::all()) }}" ></span>

        </x-form.card>

    </x-form.form>

{{-- @dd($collection) --}}
@endsection

@push('scripts')
    <script>


        var varietes=document.getElementById('varietes')
     

            var selectElement =document.getElementById('idp');
            
            var dataV = JSON.parse(document.getElementsByName('varietes')[0].getAttribute('data-variete'));
            var dataCP = JSON.parse(document.getElementsByName('culture')[0].getAttribute('data-culture'));
            document.addEventListener('DOMContentLoaded', function() {
                
                getVarietes()
            });
            selectElement.onchange=()=>getVarietes()
            function getVarietes(){
                console.log(dataV);
                document.querySelector('#tbody').innerHTML=''
                dataV.forEach(v => {
                    document.querySelector('#tbody').innerHTML +=`
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input"
                                        name="check[${v.idV}]" type="checkbox" value="${v.idV}"
                                        ${
                                            dataCP.find(culture=>culture.varieteID==v.idV && selectElement.value==culture.parcelleId) ? 'checked':''
                                            
                                        }
                                        />
                                        </div>
                                        </td>
                                        <td>${v.espece}</td>
                                        <td>${v.nomCommercial}</td>
                                        <td>${v.appelationAr}</td>
                                        <td>${v.quantite}</td>
                                        <td>${v.precocite}</td>
                                        <td>${v.resistance}</td>
                                        <td>${v.competitivite}</td>
                                        <td>${v.description}</td>
                                    </tr>`
                                });
                                
            }

    </script>
@endpush

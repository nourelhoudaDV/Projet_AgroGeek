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
        action="{{ route('cultureparcelle.save') }}"
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
                        <th class="min-w-100px">qualite</th>
                        <th class="min-w-100px">precocite</th>
                        <th class="min-w-100px">resistance</th>
                        <th class="min-w-100px">competitivite</th>
                        <th class="min-w-100px">description</th>

                    </tr>
                    </thead>
                    <tbody class="fw-bold text-gray-600">
                    @foreach($Varietes as $variete)
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input"
                                           name="check[]" type="checkbox" value="{{ $variete[$variete::PK] }}"
                                    />
                                </div>
                            </td>
                            <td>{{ $variete->espece }}</td>
                            <td>{{ $variete->nomCommercial }}</td>
                            <td>{{ $variete->appelationAr }}</td>
                            <td>{{ $variete->qualite }}</td>
                            <td>{{ $variete->precocite }}</td>
                            <td>{{ $variete->resistance }}</td>
                            <td>{{ $variete->competitivite }}</td>
                            <td>{{ $variete->description }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5">
                <x-form.button/>
            </div>

        </x-form.card>

    </x-form.form>


@endsection

@push('scripts')
    <script>



            var selectElement =document.getElementById('idp');
            var selectedId =null;
            console.log(selectElement);
            // selectElement.addEventListener("select", function() {
            //     selectedId =this.value;
            //     console.log('Selected ID:', selectedId);
            // });
            selectElement.onselect=function() {
                selectedId =this.value;
                console.log('Selected ID:', selectedId);
            }

    </script>
@endpush

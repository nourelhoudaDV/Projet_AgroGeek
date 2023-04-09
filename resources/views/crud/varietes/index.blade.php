
@extends('layout.master')
@include('include.blade-components')

@section('page_title' , 'Varietes list')
@section('breadcrumb')
    <x-group.bread-crumb
        page-tittle="liste des Variétés"
        :indexes="[

            [
               'name'=> 'liste des Variétés',
               'route'=> route('varietes.index')
           ],
        ]"
    />

@endsection
@section('content')
    @bind( $collection )
        <x-table.data-table
            :actions="$actions"
            :heads="$heads"
            edit-route="varietes.show"
            delete-route="varietes.delete"
        />
    @endBinding

    <div class="mt-4 mb-4">
        <button onclick="display1()" class="btn btn-primary">Especes history</button>

        <button onclick="display2()" class="btn btn-primary">Stade history</button>

        <button onclick="display3()" class="btn btn-primary">Stade de Variete history</button>
    </div>

    <div id="history" style="display: none">

        <div id="espece" style="display: none">
            <div class="col-12 row">
                <x-form.card col="col-12 row" title="{{ ucwords(trans('history Espece')) }}">
                    @bind( $collectionE )
                        <x-table.data-table
                            :actions="$actionsE"
                            :heads="$headsE"
                            edit-route="especes.show"
                            delete-route="especes.delete"
                        />
                    @endBinding
                </x-form.card>
            </div>
        </div>
        <div id="stade" style="display: none">
            <div class="col-12 row">
                <x-form.card col="col-12 row" title="{{ ucwords(trans('history Stade')) }}">
                    @bind( $collectionS )
                        <x-table.data-table
                            :actions="$actionsS"
                            :heads="$headsS"
                            edit-route="stades.show"
                            delete-route="stades.delete"
                        />
                    @endBinding
                </x-form.card>
            </div>
        </div>
        <div id="stadeVariete" style="display: none">
            <div class="col-12 row">
                <x-form.card col="col-12 row" title="{{ ucwords(trans('history Stade de variete')) }}">
                    @bind( $collectionSV )
                        <x-table.data-table
                            :actions="$actionsSV"
                            :heads="$headsSV"
                            edit-route="stadeVarietes.show"
                            delete-route="stadeVarietes.delete"
                        />
                    @endBinding
                </x-form.card>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function display1(){
            document.getElementById("history").style.display = 'block';
            document.getElementById("espece").style.display = 'block';
            document.getElementById("stade").style.display = 'none';
            document.getElementById("stadeVariete").style.display = 'none';
        }
        function display2(){
            document.getElementById("history").style.display = 'block';
            document.getElementById("espece").style.display = 'none';
            document.getElementById('stade').style.display = 'block';
            document.getElementById('stadeVariete').style.display = 'none';
        }
        function display3(){
            document.getElementById("history").style.display = 'block';
            document.getElementById("espece").style.display = 'none';
            document.getElementById('stade').style.display = 'none';
            document.getElementById('stadeVariete').style.display = 'block';
        }
    </script>
@endpush

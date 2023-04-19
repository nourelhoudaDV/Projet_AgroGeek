@extends('layout.master')
@include('include.blade-components')

@section('page_title', trans('pages/fermes.index_page_title'))
@section('breadcrumb')
    <x-group.bread-crumb page-tittle="{{ trans('pages/fermes.index_page_title') }}" :indexes="[
        [
            'name' => trans('pages/fermes.index_page_title'),
            'route' => route('fermes.index'),
        ],
    ]" />

@endsection


@section('content')
    @bind($collection)
        <x-table.data-table
        :actions="$actions"
        :heads="$heads"
        edit-route="fermes.show"
        delete-route="fermes.delete" />
    @endBinding

    {{-- <div class="mt-4 mb-4">
        <button onclick="display1()" class="btn btn-primary">parcelle history</button>

        <button onclick="display2()" class="btn btn-primary">type de sol history</button>
    </div>
    <div id="history" style="display: none">

    <div id="parcelle" style="display: none">
        <div class="col-12 row">
            <x-form.card col="col-12 row" title="{{ ucwords(trans('history parcelle')) }}">
                @bind( $collection1 )
                    <x-table.data-table
                        :actions="$actions1"
                        :heads="$heads1"
                        edit-route="parcelles.show"
                        delete-route="parcelles.delete"
                    />
                @endBinding
            </x-form.card>
        </div>
    </div>
    <div id="typesol" style="display: none">
        <div class="col-12 row">
            <x-form.card col="col-12 row" title="{{ ucwords(trans('history type de sol')) }}">
                @bind( $collection2 )
                    <x-table.data-table
                        :actions="$actions2"
                        :heads="$heads2"
                        edit-route="typesols.show"
                        delete-route="typesols.delete"
                    />
                @endBinding
            </x-form.card>
        </div>
    </div>
</div> --}}
@endsection

{{-- @push('scripts')
    <script>
        function display1(){
            document.getElementById("history").style.display = 'block';
            document.getElementById("typesol").style.display = 'none';
            document.getElementById("parcelle").style.display = 'block';
        }
        function display2(){
            document.getElementById("history").style.display = 'block';
            document.getElementById("parcelle").style.display = 'none';
            document.getElementById('typesol').style.display = 'block';
        }
    </script>
@endpush --}}

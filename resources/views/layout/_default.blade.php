@extends('layout.master')

@section('content')

    <table class="table align-middle table-row-dashed fs-6 gy-4" id="kt_docs_datatable_subtable">
        <!--begin::Table head-->
        <thead>
        <!--begin::Table row-->
        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-100px">Order ID</th>
            <th class="text-end min-w-100px">Created</th>
            <th class="text-end min-w-150px">Customer</th>
            <th class="text-end min-w-100px">Total</th>
            <th class="text-end min-w-100px">Profit</th>
            <th class="text-end min-w-50px">Status</th>
            <th class="text-end"></th>
        </tr>
        <!--end::Table row-->
        </thead>
        <!--end::Table head-->


        <!--begin::Table body-->
        <tbody class="fw-bold text-gray-600">
        <!--begin::SubTable template-->
        <tr data-kt-docs-datatable-subtable="subtable_template" class="d-none">
            <td colspan="2">
                <div class="d-flex align-items-center gap-3">
                    <a href="#" class="symbol symbol-50px bg-secondary bg-opacity-25 rounded">
                        <img src="/assets/media/stock/ecommerce/" alt="" data-kt-docs-datatable-subtable="template_image" />
                    </a>
                    <div class="d-flex flex-column text-muted">
                        <a href="#" class="text-dark text-hover-primary fw-bold" data-kt-docs-datatable-subtable="template_name">Product name</a>
                        <div class="fs-7" data-kt-docs-datatable-subtable="template_description">Product description</div>
                    </div>
                </div>
            </td>
            <td class="text-end">
                <div class="text-dark fs-7">Cost</div>
                <div class="text-muted fs-7 fw-bold" data-kt-docs-datatable-subtable="template_cost">1</div>
            </td>
            <td class="text-end">
                <div class="text-dark fs-7">Qty</div>
                <div class="text-muted fs-7 fw-bold" data-kt-docs-datatable-subtable="template_qty">1</div>
            </td>
            <td class="text-end">
                <div class="text-dark fs-7">Total</div>
                <div class="text-muted fs-7 fw-bold" data-kt-docs-datatable-subtable="template_total">name</div>
            </td>
            <td class="text-end">
                <div class="text-dark fs-7 me-3">On hand</div>
                <div class="text-muted fs-7 fw-bold" data-kt-docs-datatable-subtable="template_stock">32</div>
            </td>
            <td></td>
        </tr>
        <!--end::SubTable template-->

        <tr>
            <!--begin::Order ID-->
            <td>
                <a href="#" class="text-dark text-hover-primary">#XGT-346</a>
            </td>
            <!--end::Order ID-->

            <!--begin::Crated date-->
            <td class="text-end">
                10 Nov 2021, 10:30 am
            </td>
            <!--end::Created date-->

            <!--begin::Customer-->
            <td class="text-end">
                <a href="" class="text-dark text-hover-primary">Emma Smith</a>
            </td>
            <!--end::Customer-->

            <!--begin::Total-->
            <td class="text-end">
                $630.00
            </td>
            <!--end::Total-->

            <!--begin::Profit-->
            <td class="text-end">
                <span class="text-dark fw-bold">$86.70</span>
            </td>
            <!--end::Profit-->

            <!--begin::Status-->
            <td class="text-end">
                <span class="badge py-3 px-4 fs-7 badge-light-primary">Confirmed</span>
            </td>
            <!--end::Status-->

            <!--begin::Actions-->
            <td class="text-end">
                <button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                        data-kt-docs-datatable-subtable="expand_row">
                    <span class="svg-icon svg-icon-3 m-0 toggle-off">...</span>
                    <span class="svg-icon svg-icon-3 m-0 toggle-on">...</span>
                </button>
            </td>
            <!--end::Actions-->
        </tr>

        ...
        </tbody>
        <!--end::Table body-->
    </table>

@endsection

@extends('layout._errro')
@section('content')
    <div class="d-flex flex-column flex-center flex-column-fluid">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-center text-center p-10">
            <!--begin::Wrapper-->


            <!--begin::Title-->
            <h1 class="fw-bolder fs-2hx text-gray-900 mb-4">
                System Error !
            </h1>
            <!--end::Title-->

            <!--begin::Text-->
            <div class="fw-semibold fs-6 text-gray-500 mb-7">
                Something went wrong! Please try again later.
            </div>
            <!--end::Text-->

            <!--begin::Illustration-->
            <div class="mb-11">
                <img src="{{ image('auth/500-error.png') }}" class="mw-100 mh-300px theme-light-show" alt=""/>
                <img src="{{ image('auth/500-error-dark.png') }}" class="mw-100 mh-300px theme-dark-show" alt=""/>
            </div>
            <!--end::Illustration-->

            <!--begin::Link-->
            <div class="mb-0">
                <a href="/" class="btn btn-sm btn-primary">Return Home</a>
            </div>
            <!--end::Link-->

            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
    </div>
@endsection

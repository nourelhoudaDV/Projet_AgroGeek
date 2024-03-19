<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}"/>



@if(app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{ asset('assets/plugins/global/plugins.bundle.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.bundle.rtl.css') }}">
@else
    <link rel="stylesheet" href="{{ asset('assets/plugins/global/plugins.bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.bundle.css') }}">
@endif

    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
    <style>
     .page-link.active, .active > .page-link,.scrolltop {
            background-color: #5EC267 !important;
        }
    a:hover{
        color: #5EC267 !important;
    }
    </style>

@stack('styles')

<link rel="shortcut icon" href="http://127.0.0.1:8000/assets/media/logos/favicon.ico"/>



@if(app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{ asset('assets/plugins/global/plugins.bundle.rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.bundle.rtl.css') }}">
@else
    <link rel="stylesheet" href="{{ asset('assets/plugins/global/plugins.bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.bundle.css') }}">
@endif

    <link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">

@stack('styles')

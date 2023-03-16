<!DOCTYPE html >
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ printHtmlAttributes('html') }} >
<head>
    <base href=""/>
    <title>@yield('page_title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8"/>
    <meta name="page-id" content=""/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content=""/>
    <link rel="canonical" href=""/>
    @include('include.styles')
</head>

<body id="kt_app_body" {!! printHtmlClasses('body') !!} {!! printHtmlAttributes('body') !!}>

@include('partials/theme-mode/_init')

<div class="d-flex flex-column flex-root" id="kt_app_root">

    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        @include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/_header')

        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            @include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/_sidebar')

            <div class="app-main flex-column flex-row-fluid" id="kt_app_main">

                <div class="d-flex flex-column flex-column-fluid">

                    <div id="kt_app_content" class="app-content flex-column-fluid">

                        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                            <div class="d-flex flex-column flex-column-fluid">
                                <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                                    <div id="kt_app_toolbar_container"
                                         class="app-container container-xxl d-flex flex-stack">
                                        @yield('breadcrumb')
                                    </div>
                                </div>
                                <div id="kt_app_content" class="app-content flex-column-fluid">
                                    <div id="kt_app_content_container" class="app-container container-xxl">
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                @include(config('settings.KT_THEME_LAYOUT_DIR').'/partials/sidebar-layout/_footer')
            </div>

        </div>

    </div>

</div>

@include('partials/_drawers')
@include('partials/_modals')
@include('partials/_scrolltop')

@include('include.scripts')

</body>
</html>

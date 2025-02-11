<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logos/logo/logoo.svg') }}" />

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-N8ZNRQ9');
    </script>
    <!-- End Google Tag Manager -->

    <!--Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />

    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N8ZNRQ9" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="huro-app" class="app-wrapper">
        <div class="app-overlay"></div>

        <!--Full pageloader-->
        <div class="pageloader is-full"></div>
        <div class="infraloader is-full is-active"></div>

        <!--Mobile navbar-->
        @include("layouts.template-landing-page.mobile.navbar")
        <!--Mobile sidebar-->
        @include("layouts.template-landing-page.mobile.sidebar")
        <!--Webapp navbar alt-->
        @include("layouts.template-landing-page.web.partials.navbar")

        <!--Languages panel-->
        @include("layouts.template-landing-page.web.partials.languages")
        <!--Activity panel-->
        @include("layouts.template-landing-page.web.partials.activity")
        <!--Page body-->
        @include("layouts.template-landing-page.mobile.subsidebar")

        <!-- Content Wrapper -->
        <div id="app-onboarding" class="view-wrapper is-webapp" data-page-title="@yield('title')" data-naver-offset="214" data-menu-item="#layouts-navbar-menu" data-mobile-item="#home-sidebar-menu-mobile">

            <div class="page-title has-text-centered is-webapp" style="height: unset;">
                <div class="toolbar ml-auto">
                    @include("layouts.template-landing-page.web.partials.toolbar.mode")
                    @include("layouts.template-landing-page.web.partials.toolbar.languages")
                    @include("layouts.template-landing-page.web.partials.toolbar.notifications")
                    @include("layouts.template-landing-page.web.partials.toolbar.activity")
                </div>
            </div>

            @yield('landing-page')
            @yield('about')
            @yield('faq')
            @yield('domain')
            @yield('server-status')
            @yield('privacy-policy')
            @yield('terms-and-conditions')
            @yield('wordpress-hosting')
            @yield('cloud-hosting')

            <!-- @include('layouts.template-landing-page.web.partials.scrolltotop') -->
            @include('layouts.template-landing-page.web.partials.footer')
        </div>

        <!-- Sertakan jQuery terlebih dahulu -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!--Huro Scripts-->
        <script src="{{ asset('assets/js/app.js') }}"></script>

        <!-- Huro js -->
        <script src="{{ asset('assets/js/functions.js') }}" async></script>
        <script src="{{ asset('assets/js/main.js') }}" async></script>
        <script src="{{ asset('assets/js/components.js') }}" async></script>
        <script src="{{ asset('assets/js/popover.js') }}" async></script>
        <script src="{{ asset('assets/js/widgets.js') }}" async></script>

        <!-- Additional Features -->
        <script src="{{ asset('assets/js/touch.js') }}" async></script>

        <!-- Landing page js -->

        <!-- Dashboards js -->
        <script src="{{ asset('assets/js/syntax.js')}}" async></script>
        <!-- Charts js -->

        <!--Forms-->
        <script src="{{ asset('assets/js/forms.js') }}" async></script>
        @yield('scripts')
    </div>
</body>

</html>
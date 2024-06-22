<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>@yield('title') | Gym Room Dashboard</title>

    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('front-tools/favicon.ico') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('front-tools/template-backoffice/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front-tools/template-backoffice/vendor/select2/css/select2.min.css') }}"  rel="stylesheet">
    <link href="{{ asset('front-tools/template-backoffice/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('front-tools/template-backoffice/css/style.css') }}" rel="stylesheet">

    @stack('style')
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('sweetalert::alert')
    
    <!-- dynamically remplace the page content -->
    <div id="main-wrapper">
        @include('layouts.partials.backoffice.header')

        @include('layouts.partials.backoffice.aside')

        <div class="content-body" style="min-height: 735px;">
            <!-- show session msg -->
            <!-- @if(session()->has('creatSucessifullMessage'))
            <div class="alert alert-success text-white">
                {{ session()->get('creatSucessifullMessage') }}
            </div>
            @endif -->

            @yield('content')
        </div>
    </div>

    {{-- footer --}}
    <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="../index.htm" target="_blank">DexignLab</a> 2021</p>
        </div>
    </div>


    <!-- Required vendors -->
    <script src="{{ asset('front-tools/template-backoffice/vendor/global/global.min.js') }}"></script>
    
    {{-- sweet-alert --}}
    <script src="{{ asset('front-tools/template-backoffice/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('front-tools/template-backoffice/js/plugins-init/sweetalert.init.js') }}"></script>

    <script src="{{ asset('front-tools/template-backoffice/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('front-tools/template-backoffice/vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('front-tools/template-backoffice/js/plugins-init/select2-init.js') }}"></script>

    <script src="{{ asset('front-tools/template-backoffice/js/custom.min.js') }}"></script>
    <script src="{{ asset('front-tools/template-backoffice/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('front-tools/template-backoffice/js/demo.js') }}"></script>
    <script src="{{ asset('front-tools/template-backoffice/js/styleSwitcher.js') }}"></script>

    @stack('script')
</body>

</html>
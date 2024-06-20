<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>@yield('title') | Gym Room Dashboard</title>

    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('front-tools/favicon.ico') }}">
    <!-- Datatable -->
    <link href="{{ asset('front-tools/template-backoffice/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('front-tools/template-backoffice/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('front-tools/template-backoffice/css/style.css') }}" rel="stylesheet">

    <!-- tom select -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script> -->

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

    <!-- Required vendors -->
    <script src="{{ asset('front-tools/template-backoffice/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('front-tools/template-backoffice/vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Apex Chart -->
    <script src="{{ asset('front-tools/template-backoffice/vendor/apexchart/apexchart.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('front-tools/template-backoffice/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('front-tools/template-backoffice/js/plugins-init/datatables.init.js') }}"></script>

    <script src="{{ asset('front-tools/template-backoffice/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

    <script src="{{ asset('front-tools/template-backoffice/js/custom.min.js') }}"></script>
    <script src="{{ asset('front-tools/template-backoffice/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('front-tools/template-backoffice/js/demo.js') }}"></script>
    <script src="{{ asset('front-tools/template-backoffice/js/styleSwitcher.js') }}"></script>

    <!-- tom select -->
    <script>
        new TomSelect(
            'select[multiple]',
            { 
                plugins: {
                    remove_button: {title: 'Retirer'}
                }
            }
        )
    </script>

    @stack('script')
</body>

</html>
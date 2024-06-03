<!DOCTYPE html>
<html lang="en">

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

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('front-tools/template-backoffice/images/favicon.png') }}">
    <!-- Datatable -->
    <link href="{{ asset('front-tools/template-backoffice/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('front-tools/template-backoffice/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('front-tools/template-backoffice/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- dynamically remplace the page content -->
    <div id="main-wrapper">
        @include('layouts.partials.backoffice.header')


        @include('layouts.partials.backoffice.aside')


        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                @yield('content')
            </div>
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
</body>

</html>
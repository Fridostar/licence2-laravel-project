<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fitsense - Gym and Fitness HTML Template</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('front-tools/images/favicon.ico') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('front-tools/css/bootstrap.min.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('front-tools/css/owl.carousel.min.css') }}">
    <!-- LOADING FONTS AND ICONS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front-tools/rev/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front-tools/rev/fonts/font-awesome/css/font-awesome.css') }}">
    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front-tools/rev/css/rs6.css') }}">
    <!-- Simplebar CSS -->
    <link rel="stylesheet" href="{{ asset('front-tools/css/simplebar.min.css') }}">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{ asset('front-tools/css/animations.min.css') }}">
    <!-- Magnefic Popup CSS -->
    <link rel="stylesheet" href="{{ asset('front-tools/css/magnific-popup.min.css') }}">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('front-tools/fonts/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('front-tools/fonts/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-tools/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-tools/fonts/themify-icons/themify-icons.css') }}">
    <!--  Style CSS -->
    <link rel="stylesheet" href="{{ asset('front-tools/css/style.css') }}">
    <!--  Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('front-tools/css/responsive.css') }}">
</head>

<body class="bg-dark">

    <!-- dynamically remplace the page content -->
    <div class="container">
        @yield('content')
    </div>



    <!--jquery js-->
    <!-- <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
    <scrip src="{{ asset('front-tools/js/jquery.min.js') }}"></scrip>
    <!--bootstrap js-->
    <scrip src="{{ asset('front-tools/js/bootstrap.min.js') }}"></scrip>
    <!--owl-carousal-->
    <scrip src="{{ asset('front-tools/js/owl.carousel.min.js') }}"></scrip>
    <!--isotope js-->
    <scrip src="{{ asset('front-tools/js/isotope.pkgd.min.js') }}"></scrip>
    <!--countTo js-->
    <scrip src="{{ asset('front-tools/js/jquery.countTo.min.js') }}"></scrip>
    <!--Maginfic-Popup js-->
    <scrip src="{{ asset('front-tools/js/jquery.magnific-popup.min.js') }}"></scrip>
    <!-- Animation JS -->
    <scrip src="{{ asset('front-tools/js/wow.min.js') }}"></scrip>
    <!-- Rev Slider js -->
    <scrip src="{{ asset('front-tools/rev/js/rbtools.min.js') }}"></scrip>
    <scrip src="{{ asset('front-tools/rev/js/rs6.min.js') }}"></scrip>
    <scrip src="{{ asset('front-tools/js/rev-custom.js') }}"></scrip>
    <!-- Mouse Follower js -->
    <scrip src="{{ asset('front-tools/js/mouse-follower.js') }}"></scrip>
    <!-- Simplebar js -->
    <scrip src="{{ asset('front-tools/js/simplebar.min.js') }}"></scrip>
    <!--custom js-->
    <scrip src="{{ asset('front-tools/js/custom.js') }}"></scrip>
</body>

</html>
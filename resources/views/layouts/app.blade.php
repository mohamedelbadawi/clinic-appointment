<!DOCTYPE html>
<html lang="en">

<!-- doccure/  30 Nov 2019 04:11:34 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure</title>

    <!-- Favicons -->
    <link type="image/x-icon" href="{{ asset('front/img/favicon.png') }}" rel="icon">


    {{-- ---------------- --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    {{-- ++++++++++++++ --}}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
  

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('front/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/plugins/fontawesome/css/all.min.css') }}">


    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
   <script src="front/js/html5shiv.min.js"></script>
   <script src="front/js/respond.min.js"></script>
  <![endif]-->
    @livewireStyles

</head>

<body>
    <div class="main-wrapper">

        @include('front.partials.__navbar')
        @include('sweetalert::alert')

        @yield('content')
        @include('front.partials.__footer')

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('front/js/jquery.min.js') }}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('front/js/popper.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>

    <!-- Slick JS -->
    <script src="{{ asset('front/js/slick.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


    <!-- Custom JS -->
    <script src="{{ asset('front/js/script.js') }}"></script>
    @livewireScripts

</body>

<!-- doccure/  30 Nov 2019 04:11:53 GMT -->

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>BBN Fincon</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
    {{-- <link rel="stylesheet" href="{{ url('/css/app.css') }}"> --}}
    <!-- ======= Head ======= -->
    @include('partner.include.head')
    @yield('style-area')
    <!-- End Head -->
</head>

<body>
    <!-- ======= Header ======= -->
    @include('partner.include.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('partner.include.sidebar')
    <!-- End Sidebar-->

    <!-- ======= Main ======= -->
    <main id="main" class="main">

        @yield('content-area')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('partner.include.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <!-- ======= Foot ======= -->
    @include('partner.include.foot1')
    <!-- End Foot -->
    @yield('script-area')

</body>

</html>

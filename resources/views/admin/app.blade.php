<!DOCTYPE html>
<html lang="en">

<!--   Tue, 07 Jan 2020 03:33:27 GMT -->
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Blog</title>

<!-- General CSS Files -->
<link rel="stylesheet" href={{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}>
<link rel="stylesheet" href={{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}>

<!-- Template CSS -->
<link rel="stylesheet" href={{ asset('assets/css/style.min.css') }}>
<link rel="stylesheet" href={{ asset('admin/assets/css/style.min.css') }}>

{{-- additional stylesheet --}}
@stack('stylesheet')

</head>
<body class="layout-4">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('admin.navbar')

        @include('admin.sidebar')

        @section('main-section')
            This is the main section
        @show

    </div>
</div>

<!-- General JS Scripts -->
<script src={{ asset('admin/assets/bundles/lib.vendor.bundle.js') }}></script>

<!-- Template JS File -->
<script src={{ asset('admin/js/scripts.js') }}></script>

{{-- additional scripts --}}
@stack('scripts')
</body>

<!--   Tue, 07 Jan 2020 03:35:12 GMT -->
</html>

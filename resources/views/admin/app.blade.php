<!DOCTYPE html>
<html lang="en">

<!--   Tue, 07 Jan 2020 03:33:27 GMT -->
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Blog</title>

<!-- General CSS Files -->
<link rel="stylesheet" href={{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}>
<link rel="stylesheet" href={{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}>

<!-- CSS Libraries -->
<link rel="stylesheet" href={{ asset('admin/assets/modules/jqvmap/dist/jqvmap.min.css') }}>
<link rel="stylesheet" href={{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}>
<link rel="stylesheet" href={{ asset('admin/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}>
<link rel="stylesheet" href={{ asset('admin/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}>

<!-- Template CSS -->
<link rel="stylesheet" href={{ asset('assets/css/style.min.css') }}>
<link rel="stylesheet" href={{ asset('admin/assets/css/style.min.css') }}>
<link rel="stylesheet" href={{ asset('admin/assets/css/easyMDECodeblockCustomization.css') }}>

<style>
    #previewImage {
  display: block;
  max-width: 400px; /* Adjust the maximum width as needed */
  max-height: 400px; /* Adjust the maximum height as needed */
  width: auto;
  height: auto;
}

</style>

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
<script src={{ asset('admin/js/CodiePie.js') }}></script>

<!-- JS Libraies -->
<script src={{ asset('admin/assets/modules/jquery.sparkline.min.js') }}></script>
<script src={{ asset('admin/assets/modules/chart.min.js') }}></script>
<script src={{ asset('admin/assets/modules/owlcarousel2/dist/owl.carousel.min.js') }}></script>
<script src={{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}></script>
<script src={{ asset('admin/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}></script>
<link rel="stylesheet" href="assets/modules/select2/dist/css/select2.min.css">


<!-- Page Specific JS File -->
<script src={{ asset('admin/js/page/index.js') }}></script>

<!-- Template JS File -->
<script src={{ asset('admin/js/scripts.js') }}></script>
<script src={{ asset('admin/js/custom.js') }}></script>

<link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
<script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>

<link rel="stylesheet" href="{{ asset('admin/assets/modules/select2/dist/css/select2.min.css') }}">
<script src="{{ asset('admin/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

{{-- additional scripts --}}
@stack('scripts')
</body>

<!--   Tue, 07 Jan 2020 03:35:12 GMT -->
</html>

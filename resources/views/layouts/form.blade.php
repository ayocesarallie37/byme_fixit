<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ secure_asset('vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ secure_asset('css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ secure_asset('images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <!-- content-wrapper start -->
      @yield('content')
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ secure_asset('vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ secure_asset('js/off-canvas.js') }}"></script>
  <script src="{{ secure_asset('js/hoverable-collapse.js') }}"></script>
  <script src="{{ secure_asset('js/template.js') }}"></script>
  <script src="{{ secure_asset('js/settings.js') }}"></script>
  <script src="{{ secure_asset('js/todolist.js') }}"></script>
  <!-- endinject -->
</body>

</html>
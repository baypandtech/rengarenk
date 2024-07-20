<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="/public/storage/{{ $genelayarlar->favicon }}" type="image/x-icon">
  <title>{{ $site_title }}</title>

  @include("admin.layouts.css")

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="https://cdn.pixabay.com/animation/2023/10/08/03/19/03-19-26-213_512.gif" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->
  @include("admin.layouts.header")
  <!-- /.navbar -->

  <!-- Left Menu -->
  @include("admin.layouts.leftmenu")
  <!-- Left Menu -->

    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->

  {{-- footer --}}
  @include("admin.layouts.footer")
  {{-- footer --}}

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include("admin.layouts.js")
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="/public/storage/{{ $genelayarlar->favicon }}" type="image/x-icon">

  <title>Şifre Sıfırlama - {{ $site_title }}</title>

  @include('admin.layouts.css')

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="/" class="h1"><b>{{ $site_title }}</b></a>
    </div>
    <div class="card-body">
        <h5 style="color: red;" class="text-center">Bu Bağlantı Artık Geçersiz!</h5>
    </div>
  </div>
</div>
<!-- /.login-box -->

@include('admin.layouts.js')
</body>
</html>

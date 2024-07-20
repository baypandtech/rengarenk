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
      <a href="/" class="h1">{{ $site_title }}</a>
    </div>        
      @include('admin.layouts.swapmodal')

        <div class="card-body">
        <p class="login-box-msg">Yeni şifrenizden sadece bir adım uzaktasınız, şifrenizi şimdi kurtarın.</p>
        <form action="/{!!Request::path()!!}"  method="post">
            @csrf
            <input type="hidden" name="token" value="{{ request('token') }}">
            <div class="input-group mb-3">
            <input name="new_password" type="password" class="form-control" placeholder="Yeni Şifre">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <div class="input-group mb-3">
            <input name="password_confirmation" type="password" class="form-control" placeholder="Şifreyi Doğrula">
            <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-lock"></span>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Şifremi Değiştir</button>
            </div>
            <!-- /.col -->
            </div>
        </form>

        <p class="mt-3 mb-1">
            <a href="/giris">Giriş</a>
        </p>
        </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

@include('admin.layouts.js')
</body>
</html>

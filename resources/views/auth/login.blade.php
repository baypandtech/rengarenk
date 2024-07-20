<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Ansonika">
    <title>Giriş Yap | {{ $site_title }}</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="/public/storage/{{ $genelayarlar->favicon }}" type="image/x-icon">

	@include('layouts.css')

</head>

<body id="login_bg" style="background: #ccc url(/public/storage/{{ setting('site.logo') }}) center center no-repeat fixed;">
	
	<nav id="menu" class="fake_menu"></nav>
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
	
	<div id="login">
		<aside>
			<figure>
				<a href="/"><h2 style="color: black;">{{ $site_title }}</h2></a>
			</figure>
			<form method="POST" action="{{ route('giris') }}" onsubmit="convertToLowercase()">
				@csrf
				<div class="access_social">
				</div>
				<div class="form-group">
					<input type="email" class="form-control" name="email" id="email" placeholder="Email" oninput="convertToLowercase()">
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password" id="password" value="" placeholder="Password">
					<i class="icon_lock_alt"></i>
				</div>
				<div class="clearfix add_bottom_30">
					<div class="checkboxes float-start">
						<label class="container_check">Beni Hatırla
							<input type="checkbox">
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="float-end mt-1"><a id="forgot" href="/sifremi-unuttum">Şifremi Unuttum?</a></div>
				</div>
				{{-- @if(session('fail'))
				<div class="form-group">
					<div class="alert alert-danger text-center">
						{{ session('fail') }}
					</div>
				</div>
				@endif --}}
				<button type="submit" class="btn_1 rounded full-width">Giriş Yap</button>
				<div class="divider"><span>veya</span></div>
				<div class="text-center add_top_10">Hesabın yok mu? <strong><a href="/kayit">Kayıt Ol!</a></strong></div>
			</form>
			<div class="copy">© 2024 {{ $site_title }}</div>
		</aside>
	</div>
	<!-- /login -->
		
    @include('layouts.js')

	@include('admin.layouts.swapmodal')

</body>
</html>
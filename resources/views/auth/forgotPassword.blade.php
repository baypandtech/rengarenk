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

<body id="login_bg"  style="background: #ccc url(/public/storage/{{ setting('site.logo') }}) center center no-repeat fixed;">
	
	<nav id="menu" class="fake_menu"></nav>
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
	@include('admin.layouts.swapmodal')

	<div id="login">
		<aside>
			<figure>
				<a href="/"><h2 style="color: black;">{{ $site_title }}</h2></a>
			</figure>
            @if (!session('token'))
                
			<form method="POST" action="{{ route('sifirla') }}" onsubmit="convertToLowercase()">
				@csrf
				<div class="access_social">
				</div>
                <h6 class="text-center">Şifrenizi mi unuttunuz? <br>Buradan kolayca yeni bir şifre alabilirsiniz.</h6>
				<div class="form-group mt-4">
					<input type="email" class="form-control" name="email" id="email" placeholder="Kayıtlı E-posta Adresinizi girin" oninput="convertToLowercase()">
					<i class="icon_mail_alt"></i>
				</div>
			
				@if(session('fail'))
				<div class="form-group">
					<div class="alert alert-danger text-center">
						{{ session('fail') }}
					</div>
				</div>
				@endif
				<button type="submit" class="btn_1 rounded full-width mt-4">Şifremi Sıfırla</button>
                <div class="divider"><span>veya</span></div>

				<div class="text-center add_top_10"><strong><a href="/giris">Giriş Yap</a></strong></div>
			</form>
            @else
            <h6 class="mt-5 text-center"><label style="color:green;">Şifre Sıfırlama Bağlantısı Gönderildi<label> <br>Bağlantı <b>{{ session('token') }}</b> adresine gönderildi!</h6>
            <p class="mt-2 text-center" style="font-style:italic;">Bağlantıyı görüntülemek için posta kutunuzu kontrol edin.</p>
            <div class="divider"><span>veya</span></div>
            <div class="text-center add_top_10">Şifreni Hatırladın Mı? <strong><a href="/giris">Giriş Yap</a></strong></div>

            @endif

			<div class="copy">© 2024 {{ $site_title }}</div>
		</aside>
	</div>
	<!-- /login -->
		
    @include('layouts.js')

  
</body>
</html>
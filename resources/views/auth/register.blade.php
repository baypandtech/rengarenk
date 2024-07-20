<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Kayıt Ol - {{ $site_title }}</title>

    <!-- Favicons-->
	<link rel="shortcut icon" href="/public/storage/{{ $genelayarlar->favicon }}" type="image/x-icon">

	@include('layouts.css')

	
</head>

<body id="register_bg" style="background: #ccc url(/public/storage/{{ setting('site.logo') }}) center center no-repeat fixed;">

	<nav id="menu" class="fake_menu"></nav>
	
	<div id="login">
		<aside>
			<figure>
				<a href="/"><a href="/"><h2 style="color: black;">{{ $site_title }}</h2></a></a>
			</figure>
			<div class="access_social"></div>
			@if (!session('token'))
				
			<form method="POST" class="register_form" action="/{!!Request::path()!!}" novalidate="novalidate" enctype="multipart/form-data" onsubmit="convertToLowercase()">
				@csrf
				<div class="form-group">
					<input class="form-control" type="text" name="name" placeholder="Ad Soyad" required>
					<i class="ti-user"></i>
				</div>
				<div class="form-group">
					<input class="form-control" type="email" name="email" id="email" placeholder="Eposta" autocomplete="new-password" oninput="convertToLowercase()" required>
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<input class="form-control" type="password" name="password" id="password1" placeholder="Şifre" autocomplete="new-password" required>
					<i class="icon_lock_alt"></i>
				</div>
				<div class="form-group">
					<input class="form-control" type="password" name="password_confirmation" id="password2" placeholder="Şifreyi Doğrula" required>
					<i class="icon_lock_alt"></i>
				</div>
				<div class="form-group mt-2">
					<label class="mb-1 text-2">Güvenlik Kodu</label>
					<div class="d-flex">
						<input class="g_code" style="padding-left: 5px;" type="text" id="code" class="form-control" value="<?php $random = substr(md5(microtime()), 0, 5); echo $random; ?>" name="security_code" readonly>
						<input style="padding-left: 10px;" autocomplete="new-password" id="sec_code" placeholder="Güvenlik Kodu *" type="text" class="form-control" name="random" required>
					</div>
				</div>
				
				@if(session('fail'))
				<div class="form-group">
					<div class="alert alert-danger text-center">
						{{ session('fail') }}
					</div>
				</div>
				@endif
				<div id="pass-info" class="clearfix"></div>
				<button type="submit" class="btn_1 rounded full-width">Kayıt Ol</button>
				<div class="divider"><span>veya</span></div>
				<div class="text-center add_top_10">Hesabın var mı? <strong><a href="/giris">Giriş Yap</a></strong></div>
			</form>
			@else
			<h6 class="mt-5 text-center"><label style="color:green;">E-posta Doğrulama Bağlantısı Gönderildi<label> <br>Bağlantı <b>{{ session('token') }}</b> adresine gönderildi!</h6>
				<p class="mt-2 text-center" style="font-style:italic;">Bağlantıyı görüntülemek için posta kutunuzu kontrol edin.</p>
				<p class="mt-2 text-center" style="font-style:italic;">Hesabınızın oluşması için doğrulama bağlantınıza tıklamanız gerekmektedir.</p>
				<div class="divider"><span>veya</span></div>
				<div class="text-center add_top_10">Hesabın Var Mı? <strong><a href="/giris">Giriş Yap</a></strong></div>
	
			@endif

			<div class="copy">© 2024 {{ $site_title }}</div>
		</aside>
	</div>
	<!-- /login -->
	
	@include('layouts.js')

	<script>
		document.addEventListener('DOMContentLoaded', function () {
			var form = document.querySelector('.register_form');
			var submitButton = form.querySelector('[type="submit"]');
			var securityCodeInput = form.querySelector('input[name="random"]');
			// var agreementCheckbox = form.querySelector('input[name="politika"]');
			// var agreementLabel = form.querySelector('label[for="option4"]');
			var sec_code = document.getElementById("sec_code");
	
			var isValidSecurityCode = false;
			var isAgreementChecked = true;
			submitButton.disabled = true;
			
	
			// Formun tüm gereken alanlarının doldurulup doldurulmadığını kontrol eden fonksiyon
			function checkFormValidity() {
				var requiredFields = form.querySelectorAll('[required]');
				var isFormValid = true;
	
				requiredFields.forEach(function (field) {
					if (!field.value.trim()) {
						isFormValid = false;
						field.classList.add('is-invalid');
					} else {
						field.classList.remove('is-invalid');
					}
				});
	
				
				// var checkboxes = document.querySelectorAll('.yetkili');
				// var checked = false;
				// checkboxes.forEach(function(checkbox) {
				// if (checkbox.checked) {
				// 		checked = true;
				// 	}
				// });
				// if (!checked) {
				// 	submitButton.disabled = true;
				// 	checkboxes.classList.add('text-danger');
				// }
	
			
				// Güvenlik kodu doğrulama ve sözleşme onayı kontrolü
				if (!isFormValid) {
					submitButton.disabled = true;
				}
				// else if(!isAgreementChecked){
				// 	submitButton.disabled = true;
				// 	agreementLabel.classList.add('text-danger');
				// }
				else if(!isValidSecurityCode){
					submitButton.disabled = true;
					sec_code.classList.add('is-invalid');
				}
				 else {
					submitButton.disabled = false;
				}
			}
	
			// Form alanlarının değerlerini kontrol et
			form.addEventListener('input', function () {
				checkFormValidity();
			});
	
			// Güvenlik kodunu kontrol et
			securityCodeInput.addEventListener('input', function () {
				var securityCodeValue = securityCodeInput.value.trim();
				var originalSecurityCode = document.getElementById("code").value;
	
				if (securityCodeValue === originalSecurityCode) {
					isValidSecurityCode = true;
					sec_code.classList.remove('text-danger');
				} else {
					isValidSecurityCode = false;
					sec_code.classList.add('text-danger');
				}
	
				checkFormValidity();
			});
	
			// // Sözleşme onayını kontrol et
			// agreementCheckbox.addEventListener('change', function () {
			// 	if (agreementCheckbox.checked) {
			// 		isAgreementChecked = true;
			// 		agreementLabel.classList.remove('text-danger');
			// 	} else {
			// 		isAgreementChecked = false;
			// 		agreementLabel.classList.add('text-danger');
			// 	}
	
			// 	checkFormValidity();
			// });
	
			// Butona tıklandığında zorunlu alanların border'ını kırmızı yap
			submitButton.addEventListener('click', function () {
				var requiredFields = form.querySelectorAll('[required]');
				requiredFields.forEach(function (field) {
					if (!field.value.trim()) {
						field.classList.add('is-invalid');
					}
				});
			});
	
		});
	
		// Checkbox'un işlevselliğini kontrol etmek için kullanılan fonksiyon
		function toggleCheckbox(checkbox) {
			if (checkbox.checked) {
				checkbox.setAttribute('required', 'required');
			} else {
				checkbox.removeAttribute('required');
			}
		}
	</script>
	<script>
		window.onload = function() {
			var button = document.querySelector('[data-target="#failModal"]');
			var button2 = document.querySelector('[data-target="#successModal"]');
	
			if (button) {button.click();}
			else if(button2){ button2.click(); }
		};
	</script>

	@include('admin.layouts.swapmodal')

	
</body>
</html>
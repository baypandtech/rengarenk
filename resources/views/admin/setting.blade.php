@extends('admin.home')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ayarlar</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <style>
 
        .container {
          max-width: 1000px;
          margin: 30px auto;
          margin-bottom: 20px;
          background-color: #fff;
          padding: 30px;
          border-radius: 10px;
          box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .form-title {
          font-size: 24px;
          margin-bottom: 30px;
        }
        .form-group {
          margin-bottom: 20px;
        }
      </style>


    <section>

        <div class="container">
            <div class="row">
                <div class="col-md-7 setting_panel">
                    <form action="/{!!Request::path()!!}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h2 class="form-title text-center">Kişisel Bilgiler</h2>
                    <div class="form-group">
                        <label for="fullName">Adı Soyadı</label>
                        <input name="name" type="text" class="form-control" id="fullName" placeholder="Adınız ve Soyadınız" value="{{ $user->name }}">
                    </div>
                    {{-- <div class="form-group">
                        <label for="phone">Telefon</label>
                        <input name="telefon" type="tel" class="form-control" id="phone" placeholder="Telefon Numaranız" value="{{ $user->telephone }}">
                    </div> --}}
                    <div class="form-group">
                        <label for="email">E-posta</label>
                        <input name="mail" type="email" class="form-control" id="email" placeholder="E-posta Adresiniz" value="{{ $user->email }}">
                    </div>
                    <div class="center">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> KAYDET</button>
                    </div>
                    </form>
                </div>
                <div class="col-md-5">
                    <form class="register_form" action="/{!!Request::path()!!}/change-pass" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h2 class="form-title text-center">Şifre Değiştirin</h2>
                    <div class="form-group">
                        <label for="oldPassword">Eski Şifre</label>
                        <input name="oldpassword" type="password" class="form-control" id="oldPassword" placeholder="Eski Şifreniz" required>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">Yeni Şifre</label>
                        <input name="newpassword" type="password" class="form-control" id="newPassword" placeholder="Yeni Şifreniz" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Yeni Şifre Tekrar</label>
                        <input name="renewpassword" type="password" class="form-control" id="confirmPassword" placeholder="Yeni Şifrenizi Tekrar Girin" required>
                    </div>
                    <div class="center">
                        <button  type="submit" class="btn btn-primary"><i class="fas fa-save"></i> KAYDET</button>
                    </div>
                    </form>
                </div>
          </div>


  </section>
  <script>
		document.addEventListener('DOMContentLoaded', function () {
			var form = document.querySelector('.register_form');
			var submitButton = form.querySelector('[type="submit"]');
	
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
				 else {
					submitButton.disabled = false;
				}
			}
	
			// Form alanlarının değerlerini kontrol et
			form.addEventListener('input', function () {
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
@endsection
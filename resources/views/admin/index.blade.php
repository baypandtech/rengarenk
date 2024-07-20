@extends('admin.home')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
         

      </div><!-- /.container-fluid -->
  </div>
    <!-- /.content-header -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <div id="toastContainer" aria-live="polite" aria-atomic="true" style="z-index:10; position: absolute; top:70px; right:20px; min-height: 200px;">
      <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
        <div style="background: red; color:white;" class="toast-header">
          <strong class="mr-auto">Hata</strong>
          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="toast-body">
        </div>
      </div>
    </div>

    <style>
      .modal{
        padding-left: 0!important;
      }
      .modal-content {
        background-color: #f9f9f9; /* Hafif gri arka plan */
        border: none; /* Kenar çizgisi yok */
        border-radius: 15px; /* Yumuşak köşeler */
        box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1); /* Daha belirgin gölgelendirme */
      }

      .modal-header {
        border-bottom: none;
        background-color: #007bff; /* Mavi arka plan */
        color: #fff; /* Beyaz metin */
        border-radius: 15px 15px 0 0; /* Yumuşak köşeler */
        padding: 20px; /* Başlık içeriğine daha fazla boşluk */
      }

      .modal-header h5 {
        margin: 0;
      }

      .modal-footer {
        border-top: none;
        background-color: #f9f9f9; /* Footer arka plan rengi */
        border-radius: 0 0 15px 15px; /* Yalnızca alt köşeleri yumuşatır */
        padding: 20px; /* Footer içeriğine daha fazla boşluk */
      }

      /* Download Button Style */
      #downloadButton {
        font-size: 18px;
        padding: 12px 24px;
        background-color: #007bff; /* Mavi buton arka planı */
        border: none;
        border-radius: 5px; /* Yumuşak köşeler */
        color: #fff; /* Beyaz metin */
        transition: background-color 0.3s ease; /* Düzgün geçiş efekti */
      }

      #downloadButton:hover {
        background-color: #0056b3; /* Butonun üzerine gelindiğinde daha koyu bir mavi */
      }

      /* Image Style */
      #modalImage {
        display: block;
        margin: auto;
        max-width: 100%;
        height: auto;
        border-radius: 15px 15px 0 0; /* Üst köşeleri yumuşatır */
      }
      .loader {
        border: 4px solid #f3f3f3; /* Light grey */
        border-top: 4px solid #3498db; /* Blue */
        border-radius: 50%;
        width: 30px;
        height: 30px;
        animation: spin 2s linear infinite;
        margin: auto;
      }
    
      @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }
    </style>

    <section class="content">
      <style>
        .activation-form {
          margin: 50px auto;
          padding: 20px;
          background-color: #f9f9f9; /* Arka plan rengi güncellendi */
          border-radius: 10px;
          box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
          opacity: 0; /* Animasyon için başlangıç değeri */
          animation: fadeIn 1s ease forwards; /* Giriş animasyonu */
        }
      
        @keyframes fadeIn {
          from {
            opacity: 0;
          }
          to {
            opacity: 1;
          }
        }
      
        .activation-form h2 {
          text-align: center;
          margin-bottom: 30px;
          font-family: 'Arial', sans-serif; /* Başlık fontu güncellendi */
          color: #333; /* Başlık rengi güncellendi */
        }
      
        .activation-form .form-group {
          position: relative;
        }
      
        .activation-form .form-group input {
          width: 100%;
          padding: 10px;
          border: 1px solid #ced4da;
          border-radius: 5px;
          transition: all 0.3s ease; /* Placeholder animasyonu için geçiş efekti */
        }
      
        .activation-form .form-group input:focus {
          outline: none;
          border-color: #007bff;
          box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
      

      
        .activation-form .form-group input:focus + label,
        .activation-form .form-group input:not(:placeholder-shown) + label {
          top: -10px;
          font-size: 12px;
          color: #007bff;
        }
      
        .activation-form .submit-btn {
          width: 100%;
          padding: 12px; /* Buton boyutu güncellendi */
          margin-top: 20px;
          background-color: #007bff;
          border: none;
          border-radius: 5px;
          color: #fff;
          font-size: 16px;
          cursor: pointer;
          transition: background-color 0.3s ease, transform 0.2s ease; /* Buton animasyonu için geçiş efekti */
        }
      
        .activation-form .submit-btn:hover {
          background-color: #0056b3;
          transform: scale(1.05); /* Buton boyutunu büyütme animasyonu */
        }
      
        .activation-form .submit-btn:focus {
          outline: none;
        }
      </style>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="activation-form">
        <div class="text-center form-title" style="color: goldenrod;"><i class="fas fa-crown"></i> Freepiko</div>
        <form id="convertForm" method="post" action="{{ route('convert') }}">
          @csrf
          <div class="form-group mb-3">
            <label for="imageUrl">Resim Linki:</label>
            <input type="text" class="form-control" id="imageUrl" name="imageUrl" placeholder="https://img.freepik.com/premium-photo/arab-saudi-doctor-woman-examining-patient-isolated-white-background_488220-63067.jpg?w=740">
          </div>
          <div class="form-group mb-3">
            <label for="imageType">Dosya Türü:</label>
            <select name="typeimage" class="form-control" id="imageType">
              <option value="jpg">JPG</option>
              <option value="png">PNG</option>
              <option value="gif">GIF</option>
              <option value="psd">PSD</option>
            </select>
          </div>
          <div class="d-grid">
            <button id="sendButton" type="submit" class="submit-btn btn btn-primary btn-block">Gönder</button>
            <div id="loader" class="loader d-none"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imageModalLabel">Resim</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <a id="downloadButton" href="#" class="btn btn-primary" download>İndir</a>
      </div>
      <div class="modal-body text-center">
        <img id="modalImage" src="" class="img-fluid">
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function(){
    $('#convertForm').submit(function(e){
      e.preventDefault();
      const imageUrlInput = document.getElementById("imageUrl");

      var imageUrl = $('#imageUrl').val();
      var imageType = $('#imageType').val();
      $('#sendButton').hide();
      $('#loader').removeClass('d-none');
      $.ajax({
        type: "POST",
        url: "{{ route('convert') }}",
        data: {
          "_token": "{{ csrf_token() }}",
          "typeimage": imageType,
          "imageUrl": imageUrl
        },
        success: function(response){
          $('#modalImage').attr('src', response.imglink);
          $('#downloadButton').attr('href', "https://www.baypand.online/public/freepiko/" + response.imageName);
          $('#downloadButton').attr('download', "/freepico_" + response.imageName);
          $('#imageModal').modal('show');
        },
        error: function(xhr, status, error){
          console.error(error);
          $('#modalImage').attr('src', ''); // Hata durumunda görüntüyü temizle
          $('#downloadButton').attr('href', '#'); // Hata durumunda indirme bağlantısını temizle
          // Modern hata mesajı için toast gösterimi
          $('.toast').toast('show'); // Toast göster
          
          if (imageUrlInput.value.trim() === "") {
                // Eğer resim linki boş ise formun gönderilmesini engelle
                event.preventDefault();
                $('.toast-body').text("Resim Linki Boş Olamaz");
          }
          else if (imageUrl.indexOf('freepik') === -1) {
            $('.toast-body').text("Freepik resim bağlantınız geçersiz.");
            $('.toast').toast('show'); // Toast göster
          }
          else{
            
            $('.toast-body').text("Link hatalı veya doğrulanamadı.");
            $('.toast').toast('show'); // Toast göster

          }
        },
        complete: function(){
          $('#sendButton').show();
          $('#loader').addClass('d-none');
        }
      });
    });
  });
  </script>

    
    </section>
  
  
@endsection
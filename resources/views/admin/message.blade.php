@extends('admin.home')
@section('content')
<style>
  .activation-form {
    max-width: 600px;
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

  .activation-form .form-group label {
    position: absolute;
    top: 12px;
    left: 15px;
    font-size: 14px;
    color: #868e96;
    transition: all 0.3s ease;
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
         

      </div><!-- /.container-fluid -->
  </div>
    <!-- /.content-header -->

    <section class="content">

      <div class="activation-form">
        <h2>Hesap Aktivasyonu</h2>
        <form method="POST" action="{{ route('active') }}">
          @csrf
          <div class="form-group">
            <input type="text" id="activation-key" name="activation_code" required placeholder="">
            <label for="activation-key">Etkinleştirme Anahtarı</label>
            <div >
            <span style="color: gray; font-size:14px;">Örnek Anahtar: MWY6mv8J-oJRg3Nm2-2GCi3V4B-msYH6a0f-QIJ8pXgT</span>
            </div>
          </div>
          <button type="submit" class="submit-btn">Etkinleştir</button>
        </form>
      </div>
     
    </section>
  
  
@endsection
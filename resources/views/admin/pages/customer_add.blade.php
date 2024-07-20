@extends('admin.home')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Müşteri Ekle</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="p-3">
<div class="card card-primary">
    
    <!-- /.card-header -->
    <!-- form start -->
    <form action="/{!!Request::path()!!}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Müşteri Adı Soyadı</label>
          <input type="text" name="adsoyad" class="form-control" id="exampleInputEmail1" placeholder="Müşteri adı ve soyadı giriniz" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Telefonu</label>
          <input type="tel" name="tel" class="form-control" id="exampleInputEmail1" placeholder="Telefon giriniz">
      </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Epostası</label>
          <input type="email" name="mail" class="form-control" id="exampleInputEmail1" placeholder="Eposta giriniz">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Kısa Açıklama</label>
            <input type="text" name="content" class="form-control" id="exampleInputEmail1" placeholder="Kısa açıklama giriniz">
        </div>
        
        
      </div>
      <!-- /.card-body -->

      <div class="card-footer center">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Kaydet</button>
      </div>
    </form>
  </div>

</section>
  @endsection
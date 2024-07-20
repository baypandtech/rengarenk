@extends('admin.home')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Blog Ekle</h1>
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
          <label for="exampleInputEmail1">Blog Adı</label>
          <input type="text" name="urun_adi" class="form-control" id="exampleInputEmail1" placeholder="Blog adı giriniz" required>
        </div>
        <div class="form-group">
          <label for="blogMetni">Blog Metni</label>
          <textarea name="aciklama" id="blogMetni" class="form-control" placeholder="Blog metni giriniz"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Blog Resmi</label>
          <div class="input-group">
            <div class="custom-file">
              <input name="image" type="file" accept="image/*" max-size="512000" class="custom-file-input" id="exampleInputFile" onchange="previewImage(event)">
              <label class="custom-file-label" for="exampleInputFile">Resim seç</label>
            </div>
          </div>
          <i style="font-size: 12px; float:right;">Max 500kb resim boyutuna izin verilmektedir.</i>
        </div>
        <div class="form-group">
          <p class="text-center mt-3" id="imagePreviewContainer" style="display: none;">
              <img id="imagePreview" src="#" alt="" class="page_detail_image">
          </p>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Seo Başlık</label>
          <input type="text" name="seobaslik" class="form-control" id="exampleInputEmail1" placeholder="Seo Başlığı Giriniz" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Seo Açıklama</label>
          <input type="text" name="seoaciklama" class="form-control" id="exampleInputEmail1" placeholder="Seo Açıklaması Giriniz" required>
        </div>
        <div class="form-group">
          <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
            <input name="yayinswitch" type="checkbox" class="custom-control-input" id="customSwitch3">
            <label class="custom-control-label" for="customSwitch3">Blogu Yayına al</label>
          </div>
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
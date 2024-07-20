@extends('admin.home')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kategoriyi Düzenle</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="p-3">
<div class="card card-primary">
    
    <!-- /.card-header -->
    <!-- form start -->
    @foreach ($category as $categories)
        
    <form action="/{!!Request::path()!!}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Kategori Adı</label>
          <input type="text" name="urun_adi" class="form-control" id="exampleInputEmail1" placeholder="Kategori adı giriniz" value="{{ $categories->baslik }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Kategori Açıklaması</label>
            <input type="text" name="aciklama" class="form-control" id="exampleInputEmail1" placeholder="Kısa açıklama giriniz" value="{{ $categories->aciklama }}">
          </div>
        <div class="form-group">
          <label for="exampleInputFile">Kategori Resmi</label>
          <div class="input-group">
            <div class="custom-file">
              <input name="image" type="file" accept="image/*" max-size="512000" class="custom-file-input" id="exampleInputFile" onchange="previewImage(event)">
              <label class="custom-file-label" for="exampleInputFile">Resim seç</label>
            </div>
          </div>
          <div class="form-group">
            <p class="text-center mt-3" id="imagePreviewContainer" style="display: none;">
                <img id="imagePreview" src="#" alt="" class="page_detail_image">
            </p>
          </div>
          <div class="form-group">
            @if (!empty($categories->image))
              <p class="text-center mt-3"><img id="old_image" src="/public/storage/{{ $categories->image }}" alt="" srcset=""  class="page_detail_image"></p>
            @endif
          </div>
          <i style="font-size: 12px; float:right;">Max 500kb resim boyutuna izin verilmektedir.</i>

          <div class="form-group">
            <div id="yayinswitchdiv" class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" blog-switch="{{ $categories->aktif }}">
              <input name="yayinswitch" type="checkbox" class="custom-control-input" id="customSwitch3">
              <label id="switchlabel" class="custom-control-label" for="customSwitch3">Kategoriyi Öne Çıkar</label>
            </div>
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Seo Başlık</label>
                <input id="seo_title" type="text" name="seo_title" class="form-control" id="exampleInputEmail1" placeholder="Özel Seo Başlığınızı Girin" value="{{ $categories->seo_title }}" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Seo Açıklama</label>
                <textarea id="seo_descripton" type="text" name="seo_description" class="form-control" id="exampleInputEmail1" placeholder="Özel Seo Açıklamanızı Girin" required>{{ $categories->seo_description }}</textarea>
            </div>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer center">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Kaydet</button>
      </div>
    </form>
    @endforeach

  </div>
  <script>
    var yayinswitchdiv =  document.getElementById("yayinswitchdiv");
       if(yayinswitchdiv.getAttribute("blog-switch") == "on"){
         document.getElementById("customSwitch3").checked = true;
         document.getElementById("switchlabel").innerHTML="Kategori Öne Çıkarılanlarda";
       }
   </script>
</section>
  @endsection
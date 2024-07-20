@extends('admin.home')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Hizmeti Düzenle</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<section class="p-3">
<div class="card card-primary">
    
    <!-- /.card-header -->
    <!-- form start -->
    @foreach ($service as $services)
        
    <form action="/{!!Request::path()!!}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Hizmet Adı</label>
          <input type="text" name="baslik" class="form-control" id="exampleInputEmail1" placeholder="Hizmet adı giriniz" value="{{ $services->baslik }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Kısa Açıklama</label>
            <input type="text" name="aciklama" class="form-control" id="exampleInputEmail1" placeholder="Kısa açıklama giriniz" value="{{ $services->aciklama_kisa }}">
          </div>
        <div class="form-group">
          <label for="exampleInputFile">Hizmet Resmi</label>
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
            @if (!empty($services->image))
              <p class="text-center mt-3"><img id="old_image" src="/public/storage/{{ $services->image }}" alt="" srcset=""  class="page_detail_image"></p>
            @endif
          </div>
          <i style="font-size: 12px; float:right;">Max 500kb resim boyutuna izin verilmektedir.</i>
        </div>
        
      </div>
      <!-- /.card-body -->

      <div class="card-footer center">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Kaydet</button>
      </div>
    </form>
    @endforeach

  </div>

</section>
  @endsection
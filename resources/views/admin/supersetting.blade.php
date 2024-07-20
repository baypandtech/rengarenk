@extends('admin.home')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Genel Ayarlar</h1>
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
        <div class="row">
            {{-- <style>
              .border_l{border-right:0.5px solid gainsboro; }
              @media (max-width: 767px) {.border_l{ border-right: none; }  }
            </style> --}}
            <div class="col-md-6">
              <div class="form-group">
                <label for="baslik"><i class="fas fa-home"></i> Site Adı</label>
                <input type="text" name="baslik" class="form-control" id="exampleInputEmail1" placeholder="Site Adını Giriniz" value="{{ $site_title }}">
              </div>
            </div>

            <div class="col-md-6 border_l pl-md-4" style="">
                <div class="form-group">
                  <label for="exampleInputFile">Site Favicon</label>
                  <div class="input-group">
                      <div class="custom-file">
                          <input name="favicon" type="file" accept="image/*" max-size="512000" class="custom-file-input" id="exampleInputFile" onchange="previewImage3(event)">
                          <label class="custom-file-label" for="exampleInputFile">Resim seç</label>
                      </div>
                  </div>
                  <i style="font-size: 12px;">Max 500kb resim boyutuna izin verilmektedir.</i>
              </div>
              <div class="form-group">
                  <p class="text-center mt-3" id="imagePreviewContainer3" style="display: none;">
                      <img id="imagePreview3" src="#" alt="" class="page_detail_image" style="width: 100px;">
                  </p>
              </div>
              @foreach ($rootsetting as $rootsettings)
              <div class="form-group">
                  <p class="text-center mt-3"><img id="old_image3" src="/public/storage/{{ $rootsettings->favicon }}" alt="{{ $site_title }}" srcset="" class="page_detail_image" style="width: 100px;"></p>
              </div>
              @endforeach
            </div>
            

        </div>
    </div>
    <!-- /.card-body -->
    
    <div class="card-footer text-center">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Kaydet</button>
    </div>
    
    </form>
  </div>

</section>
  @endsection
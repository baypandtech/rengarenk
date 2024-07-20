@extends('admin.home')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kayıt Olma Sayfası Düzenleme</h1>
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
            <div class="col-md-12">
              <div class="form-group">
                <label for="exampleInputFile">Banner Resmi</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input name="Bannerimage" type="file" accept="image/*" max-size="512000" class="custom-file-input" id="exampleInputFile2" onchange="previewImage2(event)">
                        <label class="custom-file-label" for="exampleInputFile">Resim seç</label>
                    </div>
                </div>
                <i style="font-size: 12px;">Max 500kb resim boyutuna izin verilmektedir.</i>
                </div>
                <div class="form-group">
                    <p class="text-center mt-3" id="imagePreviewContainer2" style="display: none;">
                        <img id="imagePreview2" src="#" alt="" class="page_detail_image">
                    </p>
                </div>
                @if ($page->banner_image)
                    <div class="form-group">
                        <p class="text-center mt-3"><img id="old_image2" src="/public/storage/{{ $page->banner_image }}" alt="" srcset="" class="page_detail_image"></p>
                    </div>
                @endif
    
                
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
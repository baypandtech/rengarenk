@extends('admin.home')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Hakkımızda Sayfası Düzenleme</h1>
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
                <label for="baslik"> Ana Başlık</label>
                <input type="text" name="baslik" class="form-control" id="exampleInputEmail1" placeholder="Sayfa Başlığı Giriniz" value="{{ $page->baslik }}">
              </div>
              <div class="form-group">
                <label for="baslik"> Alt Başlık</label>
                <input type="text" name="Altbaslik" class="form-control" id="exampleInputEmail1" placeholder="Alt Başlık Giriniz" value="{{ $page->alt_baslik }}">
              </div>

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
                <div class="form-group">
                    <label for="kisa_aciklama">Hakkımızda Kısa Açıklama</label>
                    <input type="text" name="kisa_aciklama" class="form-control" id="exampleInputEmail1" placeholder="Kısa Açıklama Giriniz" value="{{ $page->aciklama_kisa }}">
                </div>
                <div class="form-group">
                    <label for="aciklama"> Hakkımızda Metni</label>
                    <textarea name="aciklama" class="form-control" id="exampleInputEmail1" placeholder="Açıklama Giriniz">{{ $page->aciklama }}</textarea>
                </div>


                <div class="form-group">
                    <label for="exampleInputFile">Hakkımızda Resmi</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="image" type="file" accept="image/*" max-size="512000" class="custom-file-input" id="exampleInputFile" onchange="previewImage(event)">
                            <label class="custom-file-label" for="exampleInputFile">Resim seç</label>
                        </div>
                    </div>
                    <i style="font-size: 12px;">Max 500kb resim boyutuna izin verilmektedir.</i>
                </div>
                <div class="form-group">
                    <p class="text-center mt-3" id="imagePreviewContainer" style="display: none;">
                        <img id="imagePreview" src="#" alt="" class="page_detail_image">
                    </p>
                </div>
                @if ($page->image)
                    <div class="form-group">
                        <p class="text-center mt-3"><img id="old_image" src="/public/storage/{{ $page->image }}" alt="" srcset="" class="page_detail_image"></p>
                    </div>
                @endif

            </div>
            <div class="col-md-12 pl-md-4 pr-md-4">
                <div class="p-5" style="border-radius: 5px; border:0.5px solid gainsboro;">
                  <h4 class="text-center"><i class="fas fa-chart-line"></i> Seo Alanı</h4>
                  <div class="form-group">
                    <label for="seoTitle">SEO Başlık</label>
                    <input type="text" class="form-control" name="seoTitle" value="{{ $page->seo_title }}" placeholder="SEO Başlığınızı Girin">
                  </div>
                  <div class="form-group">
                      <label for="seoDescription">SEO Açıklama</label>
                      <textarea class="form-control" name="seoDescription" rows="3" placeholder="SEO Açıklamanızı Girin">{{ $page->seo_aciklama }}</textarea>
                  </div>
                </div>
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
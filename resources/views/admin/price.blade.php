@extends('admin.home')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Fiyatlar Sayfası Düzenleme</h1>
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
            </div>

            <div class="col-md-12 pl-md-4 pr-md-4">
              <div class="p-5" style="border-radius: 5px; border:0.5px solid gainsboro;">
                <h4 class="text-center"><i class="nav-icon fas fa-dollar-sign"></i> Fiyat Paketleri</h4>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <h5 class="text-center">Paket 1</h5>
                      <div style="padding:20px; border-radius: 5px; border:0.5px solid gainsboro;">
                        <div class="form-group">
                          <label for="seoTitle">Paket Adı</label>
                          <input type="text" class="form-control" name="peketadi1" value="{{ $package1->paket_adi }}" placeholder="Paket Adı">
                        </div>
                        <div class="form-group">
                            <label for="seoDescription">Kısa Açıklama</label>
                            <textarea class="form-control" name="paketaciklama1" placeholder="Paket Açıklaması">{{ $package1->kisa_aciklama }}</textarea>
                          </div>
                        <div class="form-group">
                          <label for="seoTitle">Fiyat</label>
                          <input type="text" class="form-control" name="paketfiyat1" value="{{ $package1->fiyat }}" placeholder="Paketin Fiyatı">
                        </div>
                        <div class="form-group">
                          <label for="seoTitle">Zaman Bilgisi</label>
                          <input type="text" class="form-control" name="paketzaman1" value="{{ $package1->ay }}" placeholder="Paketin Fiyatlandırma Dönemi">
                        </div>
                        <div class="form-group">
                          <div class="text-center custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio1" name="trend" value="paket1" {{ $package1->trend ? 'checked' : '' }}>
                            <label for="customRadio1" class="custom-control-label">Popüler Paket</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-4">
                      <h5 class="text-center">Paket 2</h5>
                      <div style="padding:20px; border-radius: 5px; border:0.5px solid gainsboro;">
                        <div class="form-group">
                          <label for="seoTitle">Paket Adı</label>
                          <input type="text" class="form-control" name="peketadi2" value="{{ $package2->paket_adi }}" placeholder="Paket Adı">
                        </div>
                        <div class="form-group">
                            <label for="seoDescription">Kısa Açıklama</label>
                            <textarea class="form-control" name="paketaciklama2" placeholder="Paket Açıklaması">{{ $package2->kisa_aciklama }}</textarea>
                          </div>
                        <div class="form-group">
                          <label for="seoTitle">Fiyat</label>
                          <input type="text" class="form-control" name="paketfiyat2" value="{{ $package2->fiyat }}" placeholder="Paketin Fiyatı">
                        </div>
                        <div class="form-group">
                          <label for="seoTitle">Zaman Bilgisi</label>
                          <input type="text" class="form-control" name="paketzaman2" value="{{ $package2->ay }}" placeholder="Paketin Fiyatlandırma Dönemi">
                        </div>
                        <div class="form-group">
                          <div class="text-center custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio2" name="trend" value="paket2" {{ $package2->trend ? 'checked' : '' }}>
                            <label for="customRadio2" class="custom-control-label">Popüler Paket</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <h5 class="text-center">Paket 3</h5>
                      <div style="padding:20px; border-radius: 5px; border:0.5px solid gainsboro;">
                        <div class="form-group">
                          <label for="seoTitle">Paket Adı</label>
                          <input type="text" class="form-control" name="peketadi3" value="{{ $package3->paket_adi }}" placeholder="Paket Adı">
                        </div>
                        <div class="form-group">
                            <label for="seoDescription">Kısa Açıklama</label>
                            <textarea class="form-control" name="paketaciklama3" placeholder="Paket Açıklaması">{{ $package3->kisa_aciklama }}</textarea>
                          </div>
                        <div class="form-group">
                          <label for="seoTitle">Fiyat</label>
                          <input type="text" class="form-control" name="paketfiyat3" value="{{ $package3->fiyat }}" placeholder="Paketin Fiyatı">
                        </div>
                        <div class="form-group">
                          <label for="seoTitle">Zaman Bilgisi</label>
                          <input type="text" class="form-control" name="paketzaman3" value="{{ $package3->ay }}" placeholder="Paketin Fiyatlandırma Dönemi">
                        </div>
                        <div class="form-group">
                          <div class="text-center custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio3" name="trend" value="paket3" {{ $package3->trend ? 'checked' : '' }}>
                            <label for="customRadio3" class="custom-control-label">Popüler Paket</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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